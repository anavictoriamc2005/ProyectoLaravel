<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    // En Producto.php
public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

}

