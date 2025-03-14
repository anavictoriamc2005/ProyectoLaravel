@extends('layout')

@section('content')
    <h1>Producto Creado</h1>
    <p>Nombre: {{ $producto->nombre }}</p>
    <p>Precio: ${{ $producto->precio }}</p>
    <p>Usuario: {{ $producto->usuario->nombre }}</p>
    <p>Marca: {{ $producto->marca->nombre ?? 'Sin Marca' }}</p>
    @if($producto->imagen)
        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" width="200">
    @endif
    <a href="{{ route('productos.index') }}">Volver</a>
@endsection
