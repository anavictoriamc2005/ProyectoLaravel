<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Lluvia */
        body {
            overflow: hidden;
            margin: 0;
            padding: 0;
            background: #1c1c1c;
        }

        .raindrop {
            position: absolute;
            background: rgba(255, 255, 255, 0.8);
            width: 1px;
            height: 10px;
            animation: fall linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100vh);
            }
            100% {
                transform: translateY(100vh);
            }
        }

        .welcome-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 15px;
            color: white;
            text-align: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            z-index: 10;
        }

        .btn-start {
            background-color: #3498db;
            padding: 12px 30px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-start:hover {
            background-color: #2980b9;
        }

        /* Reloj Digital con colores atractivos */
        .clock {
            position: absolute;
            top: 10px;
            right: 20px;
            color: #000000; /* Color de texto negro para los números */
            font-family: 'Poppins', sans-serif; /* Fuente moderna */
            font-size: 32px;
            background: linear-gradient(45deg, #B2D7F2, #E1E8F5); /* Gradiente suave entre azul y lavanda */
            padding: 15px 25px;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Sombra suave */
            text-align: center;
            animation: pulse 1.5s ease-in-out infinite, glow 1.5s alternate infinite; /* Animaciones */
        }

        /* Animación de pulsación suave (crece y se reduce) */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Animación de brillo suave */
        @keyframes glow {
            0% {
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            }
            100% {
                box-shadow: 0 0 20px rgba(255, 255, 255, 1);
            }
        }

        /* Hacer el reloj más atractivo cuando se pase el mouse */
        .clock:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.7); /* Brillo más intenso */
        }

    </style>
</head>
<body>

    <div id="rain"></div>

    <!-- Reloj Digital Atractivo -->
    <div id="clock" class="clock"></div>

    <div class="welcome-container">
        <h1 class="text-4xl font-bold mb-6">Bienvenido a CRUD Usuarios y Productos</h1>
        <p class="text-lg mb-8">¡Comienza tu sesión para gestionar usuarios y productos!</p>
        <a href="{{ route('login') }}" class="btn-start">Comenzar</a>
    </div>

    <script>
        // Generar gotas de lluvia
        function createRaindrop() {
            const rain = document.getElementById('rain');
            const raindrop = document.createElement('div');
            raindrop.classList.add('raindrop');
            raindrop.style.left = `${Math.random() * 100}vw`;
            raindrop.style.animationDuration = `${Math.random() * 2 + 2}s`; // Aleatorio entre 2-4 segundos
            raindrop.style.animationDelay = `${Math.random() * 3}s`; // Aleatorio para dispersar la lluvia
            rain.appendChild(raindrop);

            // Eliminar la gota después de la animación
            setTimeout(() => {
                raindrop.remove();
            }, 4000);
        }

        setInterval(createRaindrop, 30); // Crear gotas cada 30ms

        // Función para actualizar el reloj
        function updateClock() {
            const clockElement = document.getElementById('clock');
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            clockElement.textContent = `${hours}:${minutes}:${seconds}`;
        }

        // Actualizar el reloj cada segundo
        setInterval(updateClock, 1000);
        updateClock(); // Inicializar el reloj inmediatamente
    </script>

</body>
</html>
