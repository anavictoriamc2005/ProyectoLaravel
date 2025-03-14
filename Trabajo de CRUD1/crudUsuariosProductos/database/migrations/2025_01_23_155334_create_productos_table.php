<?php

// database/migrations/xxxx_xx_xx_create_productos_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('precio', 8, 2); // Asegúrate de usar el tipo decimal adecuado
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
            
            // Añadir índice para mejorar el rendimiento en búsquedas por usuario_id
            $table->index('usuario_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}


