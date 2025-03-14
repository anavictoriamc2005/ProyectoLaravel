@extends('layout')

@section('content')
    <h2>Editar Usuario</h2>
    <form method="POST" action="{{ route('usuarios.update', $id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="usuario">Nombre de Usuario:</label>
            <input type="text" name="usuario" id="usuario" value="{{ $usuario['usuario'] }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $usuario['email'] }}" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" value="{{ $usuario['password'] }}" required>
        </div>

        <button type="submit" class="btn-save">Actualizar</button>
    </form>
@endsection
