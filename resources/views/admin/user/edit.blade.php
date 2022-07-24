@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
<h2>Editar Usuário</h2>
@stop

@section('content')
{{-- Treating errors --}}
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="col-md-9">

    <form action="{{ route('user.update', $user->id)}}" method="POST">
        @csrf
        @method('PUT')
       
            <div class="form-group">
                <x-adminlte-input name="login" value="{{ $user->login }}" placeholder="login" required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-at text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="form-group">
                <x-adminlte-input name="name" value="{{ $user->name }}" placeholder="nome completo" required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="form-group">
                <x-adminlte-input name="email" value="{{ $user->email }}" type="email" placeholder="email" required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="form-group">
                <x-adminlte-input value="" name="password" type="password" placeholder="senha">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-key text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

        <div class="form-group">
            <x-adminlte-button label="Enviar" type="submit" theme="primary" class="mt-3"/>
        </div>

    </form>


</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop