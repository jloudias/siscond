<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session, Auth, Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index')->with('users',User::all()); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'login'=>'required|min:4|max:20',
            'name'=>'required|max:150',
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        User::create([
            'login'=>request('login'),
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>bcrypt(request('password')),
        ]);

        return redirect()->route('user.index')->with('success', 'Usuário criado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.user.edit')->with('user',User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
        $request->validate([
            'login'=>'min:4|max:20',
            'name'=>'max:150',
            'email'=>'email',
        ]);

        $user=User::find($id);

        // oneliner
        //$user->update($request->has('password') ? array_merge($request->except('password'), ['password' => bcrypt($request->input('password'))]) : $request->except('password'));
       
        // no password change
        if(empty(request('password'))){
            $user->update($request->except(['password']));
        }
        // password change
        else{
            $user->update([
                'username'=>request('username'),
                'name'=>request('name'),
                'email'=>request('email'),
                'password'=>bcrypt(request('password')),
            ]); 
        } 
        return redirect()->route('user.index')->with('success', 'Usuário alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success','Usuário excluído com sucesso!');
    }
}
