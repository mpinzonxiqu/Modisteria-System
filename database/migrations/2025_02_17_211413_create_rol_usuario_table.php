<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('rol_usuario', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->unsignedBigInteger('user_id'); // Clave foránea para usuarios
            $table->unsignedBigInteger('rol_id'); // Clave foránea para roles
            $table->enum('estado', ['activo', 'inactivo'])->default('activo'); // Estado de la relación
            $table->timestamps(); // Timestamps para created_at y updated_at

            // Relaciones foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rol_usuario');
    }
}
