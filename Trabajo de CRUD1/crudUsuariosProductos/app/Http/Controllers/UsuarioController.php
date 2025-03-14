<?php


// Archivo: app/Http/Controllers/UsuarioController.php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Muestra la lista de usuarios
    public function index()
    {
        $usuarios = session('usuarios', []);
        return view('usuarios.index', compact('usuarios'));
    }

    // Muestra el formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }

    // Almacena el nuevo usuario en la sesión
    public function store(Request $request)
    {
        $usuarios = session('usuarios', []);
        $usuarios[] = $request->all();
        session(['usuarios' => $usuarios]);

        return redirect()->route('usuarios.index');
    }

    // Muestra el formulario para editar un usuario
    public function edit($id)
    {
        $usuarios = session('usuarios', []);
        $usuario = $usuarios[$id];
        return view('usuarios.edit', compact('usuario', 'id'));
    }

    // Actualiza los datos de un usuario
    public function update(Request $request, $id)
    {
        $usuarios = session('usuarios', []);
        
        // Actualizar los datos del usuario con los nuevos valores
        $usuarios[$id]['usuario'] = $request->input('usuario');
        $usuarios[$id]['email'] = $request->input('email');
        
        // Guardar la lista actualizada en la sesión
        session(['usuarios' => $usuarios]);
    
        return response()->json(['message' => 'Usuario actualizado correctamente.'], 200);
    }
    public function destroy($id)
    {
        $usuarios = session('usuarios', []);
    
        // Eliminar el usuario correspondiente
        if (isset($usuarios[$id])) {
            unset($usuarios[$id]);
            
            // Reindexar los usuarios para evitar huecos en el array
            $usuarios = array_values($usuarios);
            
            // Guardar la lista actualizada en la sesión
            session(['usuarios' => $usuarios]);
    
            return response()->json(['message' => 'Usuario eliminado correctamente.'], 200);
        }
    
        return response()->json(['message' => 'Usuario no encontrado.'], 404);
    }
    
}