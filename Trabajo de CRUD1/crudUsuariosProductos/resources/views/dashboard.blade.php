@extends('layout')

@section('content')
    <h2>Bienvenido al Panel de Administración</h2>

    <div class="button-container">
        <a href="{{ route('usuarios.create') }}">
            <button class="btn-create-user">Crear Usuario</button>
        </a>
        <a href="{{ route('productos.create') }}">
            <button class="btn-create-product">Crear Producto</button>
        </a>
    </div>
@endsection

<style>
    /* Fondo con animación de aurora boreal */
    body {
        background: #000;
        overflow: hidden;
        margin: 0;
        padding: 0;
        height: 100vh;
        background: linear-gradient(180deg, #000, #003366);
        animation: aurora 15s ease-in-out infinite;
    }

    @keyframes aurora {
        0% {
            background: linear-gradient(180deg, #000, #003366);
        }
        25% {
            background: linear-gradient(180deg, #003366, #008080);
        }
        50% {
            background: linear-gradient(180deg, #008080, #00ff99);
        }
        75% {
            background: linear-gradient(180deg, #00ff99, #003366);
        }
        100% {
            background: linear-gradient(180deg, #003366, #000);
        }
    }

    .button-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 50px;
    }

    .btn-create-user, .btn-create-product {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-create-user:hover, .btn-create-product:hover {
        background-color: #45a049;
    }
    h2{
        color: white;
    }
</style>
