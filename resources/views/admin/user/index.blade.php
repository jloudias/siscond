@extends('adminlte::page')
@section('title', 'Users')
@section('plugins.Datatables', true)

@section('content_header')
<h1>Usuários</h1>
<br>
<a href="{{ route('user.create') }}">
    <x-adminlte-button label="&nbsp; Adicionar Usuário" theme="primary" icon="fas fa-plus" class="mb-2" />
</a>

@stop

@section('content')
@php
$heads = [
'Login',
'Name',
'Email',
'Actions',
];

$config=[
'order'=>[[1,'asc']],
'columns'=>[null,null,null,['orderable'=>false]],
'lengthMenu'=>[5,10,15,30],
'language'=>['url'=>'http://movlin/siscond/pt-BR.json'],
]

@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="tblUsers" :heads="$heads" :config="$config" head-theme="light" hoverable compressed>

    @foreach($users as $u)
    <tr>
        <td>{{ $u->login}}</td>
        <td>{{ $u->name}}</td>
        <td>{{ $u->email}}</td>
        <td>
            <form action="{{ route('user.destroy',$u->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <nobr>
                    <a href="{{ route('user.edit', $u->id)}}" class="btn btn-xs btn-default text-primary mx-1 shadow"
                        title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>

                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </button>
                    <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" onclick="return confirm('Tem certeza? Essa ação não pode ser desfeita.');">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                </nobr>
            </form>

        </td>
    </tr>
    @endforeach
</x-adminlte-datatable>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
{{-- DataTables plugin --}}
<script>   
    $(document).ready( function () {
        $('#tblUsers').dataTable();
    } );
</script>

{{-- Session messages with Toastr --}}
@if(Session::has('success'))
<script>
    toastr.success("{{ Session::get('success')}}");
</script>

@endif
@stop