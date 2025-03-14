@extends('layout')

@section('content')
    <h1>Usuario Creado</h1>
    <p>Nombre: {{ $usuario->nombre }}</p>
    <p>Email: {{ $usuario->email }}</p>
    <a href="{{ route('usuarios.index') }}">Volver</a>
@endsection
