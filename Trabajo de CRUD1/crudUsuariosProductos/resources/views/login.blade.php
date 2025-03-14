<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Estrellas de fondo */
        body {
            background: black;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .star {
            position: absolute;
            background-color: white;
            border-radius: 50%;
            animation: twinkle 2s infinite alternate;
        }

        @keyframes twinkle {
            0% {
                opacity: 0.2;
            }
            100% {
                opacity: 1;
            }
        }

        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 15px;
            color: white;
            text-align: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            z-index: 10;
        }

        .btn-login {
            background-color: #3498db;
            padding: 12px 30px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color: #2980b9;
        }

        /* Estilos para el borde brillante al hacer foco */
        input:focus {
            border-color: #3498db; /* El color del borde brillante */
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.8); /* Efecto de resplandor */
            outline: none; /* Elimina el borde predeterminado del navegador */
        }

        /* Estilos para el ojo */
        .eye-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        /* Estilos para la ventana emergente de cookies */
        .cookie-banner {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            display: none; /* Oculto por defecto */
            z-index: 1000;
            text-align: center;
            width: 80%;
        }

        .cookie-buttons {
            margin-top: 10px;
        }

        .cookie-button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .cookie-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div id="stars"></div>

    <div class="login-container">
        <h1 class="text-3xl font-bold mb-6">¿Quién eres para comenzar la sesión?</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <input type="text" name="usuario" placeholder="Usuario" class="w-full px-4 py-2 border border-gray-300 rounded-lg" style="color:black" required>
            </div>

            <div class="mb-4 relative">
                <input type="password" id="password" name="password" placeholder="Contraseña" class="w-full px-4 py-2 border border-gray-300 rounded-lg" style="color:black" required>
                <span id="eye-icon" class="eye-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="eye-icon">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.938 5 12 5c4.062 0 8.268 2.943 9.542 7-1.274 4.057-5.48 7-9.542 7-4.062 0-8.268-2.943-9.542-7zM12 8a4 4 0 110 8 4 4 0 010-8z"/>
                    </svg>
                </span>
            </div>

            <button type="submit" class="btn-login">Iniciar Sesión</button>
        </form>

        <div class="mt-4">
            <h2 class="font-semibold text-gray-300">Usuarios disponibles:</h2>
            <ul class="list-disc pl-5 text-gray-200">
                <li>usuario1 - contraseña1</li>
                <li>usuario2 - contraseña2</li>
                <li>usuario3 - contraseña3</li>
                <li>usuario4 - contraseña4</li>
                <li>usuario5 - contraseña5</li>
                <li>usuario6 - contraseña6</li>
            </ul>
        </div>
    </div>

    <!-- Banner de cookies -->
    <div class="cookie-banner" id="cookie-banner">
        <p>Este sitio utiliza cookies. ¿Aceptas las cookies de este sitio?</p>
        <div class="cookie-buttons">
            <button class="cookie-button" id="accept-cookies">Aceptar</button>
            <button class="cookie-button" id="reject-cookies">Rechazar</button>
        </div>
    </div>

    <script>
        // Generar estrellas
        function createStar() {
            const star = document.createElement('div');
            star.classList.add('star');
            const size = Math.random() * 2 + 1;
            star.style.width = `${size}px`;
            star.style.height = `${size}px`;
            star.style.top = `${Math.random() * 100}vh`;
            star.style.left = `${Math.random() * 100}vw`;
            star.style.animationDuration = `${Math.random() * 2 + 2}s`; // Aleatorio entre 2-4 segundos
            document.body.appendChild(star);

            // Eliminar la estrella después de la animación
            setTimeout(() => {
                star.remove();
            }, 2000);
        }

        setInterval(createStar, 50); // Crear estrellas cada 50ms

        // Funcionalidad para ver/ocultar contraseña
        const eyeIcon = document.getElementById("eye-icon");
        const passwordInput = document.getElementById("password");

        eyeIcon.addEventListener("click", function() {
            // Cambiar tipo de input entre "password" y "text"
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="eye-icon">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12c0 1.104-.896 2-2 2s-2-.896-2-2 2-.896 2-2 2 .896 2 2z"/>
                    </svg>
                `;
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="eye-icon">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.938 5 12 5c4.062 0 8.268 2.943 9.542 7-1.274 4.057-5.48 7-9.542 7-4.062 0-8.268-2.943-9.542-7zM12 8a4 4 0 110 8 4 4 0 010-8z"/>
                    </svg>
                `;
            }
        });

        // Mostrar la ventana emergente de cookies después de 2 segundos
        setTimeout(() => {
            document.getElementById('cookie-banner').style.display = 'block';
        }, 2000);

        // Aceptar cookies
        document.getElementById('accept-cookies').addEventListener('click', function() {
            document.getElementById('cookie-banner').style.display = 'none';
        });

        // Rechazar cookies
        document.getElementById('reject-cookies').addEventListener('click', function() {
            document.getElementById('cookie-banner').style.display = 'none';
        });
    </script>

</body>
</html>
