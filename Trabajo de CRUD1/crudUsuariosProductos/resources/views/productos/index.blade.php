<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        h1 {
            color: #333;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            font-size: 1.1rem;
            margin: 10px 0;
        }

        strong {
            color: #555;
        }

        .editable {
            background-color: #e8f0fe; /* Fondo azul claro */
            border: 1px solid #0066cc; /* Borde azul */
            border-radius: 5px;
            padding: 5px;
            font-size: 1rem;
            width: 200px;
            margin-left: 10px;
        }

        .hidden {
            display: none;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            margin-right: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h1>Productos</h1>
    <a href="#">Crear Producto</a>
    <div id="producto">
        <p><strong>Nombre:</strong> <span id="nombre">ff</span></p>
        <p><strong>Precio:</strong> <span id="precio">12.00</span></p>
        <p><strong>Usuario:</strong> <span id="usuario">bmw</span></p>
        <p><strong>Marca:</strong> <span id="marca">BMWw</span></p>
        <button id="editarBtn">Editar</button>
        <button id="guardarBtn" class="hidden">Guardar</button>
        <button id="eliminarBtn" class="btn-danger">Eliminar</button>
    </div>

    <script>
        const editarBtn = document.getElementById("editarBtn");
        const guardarBtn = document.getElementById("guardarBtn");
        const eliminarBtn = document.getElementById("eliminarBtn");
        const productoDiv = document.getElementById("producto");

        const campos = ["nombre", "precio", "usuario", "marca"];
        const elementos = {};

        // Convertir campos a inputs para editar
        editarBtn.addEventListener("click", () => {
            campos.forEach(campo => {
                const span = document.getElementById(campo);
                const valor = span.textContent;

                // Crear un input editable
                const input = document.createElement("input");
                input.type = campo === "precio" ? "number" : "text";
                input.id = campo + "Input";
                input.value = valor;
                input.className = "editable";

                // Reemplazar el span por el input
                span.replaceWith(input);
                elementos[campo] = input;
            });

            editarBtn.classList.add("hidden");
            guardarBtn.classList.remove("hidden");
        });

        // Guardar los cambios y regresar a la vista original
        guardarBtn.addEventListener("click", () => {
            let hayError = false;

            campos.forEach(campo => {
                const input = elementos[campo];
                const valor = input.value;

                // Validar si el campo está vacío
                if (!valor.trim()) {
                    hayError = true;
                }
            });

            if (hayError) {
                alert("Error al actualizar el producto. Todos los campos deben estar llenos.");
                return;
            }

            campos.forEach(campo => {
                const input = elementos[campo];
                const valor = input.value;

                // Crear un span para mostrar el valor
                const span = document.createElement("span");
                span.id = campo;
                span.textContent = valor;

                // Reemplazar el input por el span
                input.replaceWith(span);
            });

            guardarBtn.classList.add("hidden");
            editarBtn.classList.remove("hidden");

            // Aquí podrías enviar los datos a tu servidor si es necesario
            const datos = {
                nombre: document.getElementById("nombre").textContent,
                precio: document.getElementById("precio").textContent,
                usuario: document.getElementById("usuario").textContent,
                marca: document.getElementById("marca").textContent,
            };

            console.log("Datos guardados:", datos);

            // Mostrar alerta de confirmación
            alert("Producto actualizado correctamente");
        });

        // Eliminar el producto
        eliminarBtn.addEventListener("click", () => {
            if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
                productoDiv.remove(); // Elimina el producto de la interfaz
                console.log("Producto eliminado");
            }
        });
    </script>
</body>
</html>
