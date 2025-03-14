@extends('layout')

@section('content')
    <h2>Crear Producto</h2>
    <form method="POST" action="{{ route('productos.store') }}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" required>
        </div>

        <div class="form-group">
            <label for="usuario">Nombre de Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>
        </div>

        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" required>
        </div>

        <div class="form-group">
            <label for="image">Imagen:</label>
            <input type="file" name="image" id="image">
        </div>

        <button type="submit" class="btn-save">Guardar</button>
    </form>
@endsection

<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        overflow: hidden;
        position: relative;
    }

    /* Fondo con el amanecer */
    .sunrise-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, #f39c12, #f1c40f, #d35400);
        animation: sunrise 20s infinite;
        background-size: 100% 200%;
    }

    /* Animación para el amanecer */
    @keyframes sunrise {
        0% {
            background-position: 0% 100%;
        }
        50% {
            background-position: 0% 50%;
        }
        100% {
            background-position: 0% 0%;
        }
    }

    /* Luna que aparece sobre el amanecer */
    .moon {
        position: absolute;
        top: 20%;
        right: 10%;
        width: 100px;
        height: 100px;
        background-color: #f2f2f2;
        border-radius: 50%;
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
        animation: moveMoon 15s infinite linear;
    }

    /* Movimiento de la luna */
    @keyframes moveMoon {
        0% {
            transform: translateX(0) rotate(0deg);
        }
        100% {
            transform: translateX(-300px) rotate(360deg);
        }
    }

    /* Estilo general para el formulario */
    form {
        position: relative;
        z-index: 2;
        padding: 20px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
        max-width: 500px;
        margin: 30px auto;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn-save {
        padding: 10px 20px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-save:hover {
        background-color: #2980b9;
    }
</style>

<div class="sunrise-background"></div>
<div class="moon"></div>

