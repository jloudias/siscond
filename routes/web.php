<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// PÚBLICO
Route::get('/', function () {
    return redirect('/home');
});

// USUÁRIOS AUTENTICADOS
Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ADMINISTRADORES
Route::prefix('admin')->middleware('auth','admin')->group(function(){
    Route::get('/', function(){
        return view('admin.index');
    })->name('admin.index');
    Route::resource('user', App\Http\Controllers\UserController::class);


});
