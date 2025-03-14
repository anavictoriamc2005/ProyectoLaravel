<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Esta línea es necesaria

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'email'];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
