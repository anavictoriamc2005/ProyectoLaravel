@extends('layout')

@section('content')
    <h2>Crear Usuario</h2>
    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf
        <div class="form-group">
            <label for="usuario">Nombre de Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="btn-save">Guardar</button>
    </form>
@endsection

<style>
    /* Fondo de atardecer animado */
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        overflow: hidden;
        position: relative;
        background: linear-gradient(180deg, #FF7E5F, #feb47b);
        animation: sunsetAnimation 30s infinite alternate;
    }

    @keyframes sunsetAnimation {
        0% {
            background: linear-gradient(180deg, #FF7E5F, #feb47b); /* Cielo al atardecer */
        }
        50% {
            background: linear-gradient(180deg, #2c3e50, #bdc3c7); /* Cielo oscuro */
        }
        100% {
            background: linear-gradient(180deg, #FF7E5F, #feb47b); /* Cielo al atardecer */
        }
    }

    /* Efecto de sol en movimiento */
    .sun {
        position: absolute;
        bottom: -50px;
        left: 50%;
        transform: translateX(-50%);
        width: 150px;
        height: 150px;
        background-color: #ffcc00;
        border-radius: 50%;
        box-shadow: 0 0 30px rgba(255, 204, 0, 0.8);
        animation: sunMovement 30s infinite alternate;
    }

    @keyframes sunMovement {
        0% {
            bottom: -50px;
            opacity: 1;
        }
        50% {
            bottom: 10vh;
            opacity: 0.8;
        }
        100% {
            bottom: -50px;
            opacity: 1;
        }
    }

</style>

<div class="sun"></div>
