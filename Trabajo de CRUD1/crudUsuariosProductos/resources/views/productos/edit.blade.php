@extends('layout')

@section('content')
    <h2>Editar Producto</h2>
    <form method="POST" action="{{ route('productos.update', $id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $producto['nombre'] }}" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" value="{{ $producto['precio'] }}" required>
        </div>

        <div class="form-group">
            <label for="usuario">Nombre de Usuario:</label>
            <input type="text" name="usuario" id="usuario" value="{{ $producto['usuario'] }}" required>
        </div>

        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" value="{{ $producto['marca'] }}" required>
        </div>

        <button type="submit" class="btn-save">Actualizar</button>
    </form>
@endsection
