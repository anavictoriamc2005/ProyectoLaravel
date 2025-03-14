<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Muestra la lista de productos
    public function index()
    {
        $productos = session('productos', []);
        return view('productos.index', compact('productos'));
    }

    // Muestra el formulario para crear un nuevo producto
    public function create()
    {
        return view('productos.create');
    }

    // Almacena el nuevo producto en la sesión
    public function store(Request $request)
    {
        $productos = session('productos', []);
        $productos[] = $request->all();
        session(['productos' => $productos]);

        return redirect()->route('productos.index');
    }

    // Muestra el formulario para editar un producto
    public function edit($id)
    {
        $productos = session('productos', []);
        $producto = $productos[$id];
        return view('productos.edit', compact('producto', 'id'));
    }

    // Actualiza los datos de un producto
    public function update(Request $request, $id)
    {
        $productos = session('productos', []);
        $productos[$id] = $request->all();
        session(['productos' => $productos]);

        return redirect()->route('productos.index');
    }
}