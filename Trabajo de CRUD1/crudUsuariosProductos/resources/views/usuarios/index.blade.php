@extends('layout')

@section('content')
    <div class="section-container">
        <h2>Usuarios</h2>
        <a href="{{ route('usuarios.create') }}" class="btn-create">Crear Usuario</a>
        
        <div class="usuarios-list">
            @foreach($usuarios as $index => $usuario)
                <div class="usuario" id="usuario-{{ $index }}">
                    <p>
                        <strong>Nombre:</strong> 
                        <input type="text" value="{{ $usuario['usuario'] }}" disabled class="input-field" id="nombre-{{ $index }}">
                    </p>
                    <p>
                        <strong>Email:</strong> 
                        <input type="email" value="{{ $usuario['email'] }}" disabled class="input-field" id="email-{{ $index }}">
                    </p>
                    <button class="btn-edit" onclick="enableEdit({{ $index }})">Editar</button>
                    <button class="btn-save" onclick="saveChanges({{ $index }})" style="display: none;">Guardar</button>
                    <button class="btn-delete" onclick="deleteUser({{ $index }})">Eliminar</button> <!-- Botón Eliminar -->
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Habilitar edición de campos
        function enableEdit(index) {
            const nombreField = document.getElementById(`nombre-${index}`);
            const emailField = document.getElementById(`email-${index}`);
            const saveButton = document.querySelector(`#usuario-${index} .btn-save`);

            nombreField.disabled = false;
            emailField.disabled = false;
            nombreField.classList.add('editable');
            emailField.classList.add('editable');

            saveButton.style.display = 'inline-block';
        }

        // Guardar cambios en el usuario
        function saveChanges(index) {
            const nombreField = document.getElementById(`nombre-${index}`);
            const emailField = document.getElementById(`email-${index}`);

            fetch(`/usuarios/${index}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    usuario: nombreField.value,
                    email: emailField.value
                })
            }).then(response => {
                if (response.ok) {
                    alert('Usuario actualizado correctamente.');

                    // Deshabilitar campos de texto y ocultar el botón de guardar
                    nombreField.disabled = true;
                    emailField.disabled = true;
                    nombreField.classList.remove('editable');
                    emailField.classList.remove('editable');

                    const saveButton = document.querySelector(`#usuario-${index} .btn-save`);
                    saveButton.style.display = 'none';
                } else {
                    alert('Error al actualizar el usuario.');
                }
            });
        }

        // Eliminar un usuario
        function deleteUser(index) {
            if (confirm("¿Estás seguro de que quieres eliminar este usuario?")) {
                fetch(`/usuarios/${index}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    }
                }).then(response => {
                    if (response.ok) {
                        alert('Usuario eliminado correctamente.');
                        
                        // Eliminar el usuario de la vista
                        const usuarioDiv = document.getElementById(`usuario-${index}`);
                        usuarioDiv.remove();
                    } else {
                        alert('Error al eliminar el usuario.');
                    }
                });
            }
        }
    </script>

    <style>
        .input-field {
            border: none;
            background: none;
        }

        .input-field.editable {
            border: 1px solid #007BFF;
            background: #f0f8ff;
        }

        .btn-save {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-top: 5px;
        }

        .btn-save:hover {
            background-color: #218838;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-top: 5px;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
@endsection
