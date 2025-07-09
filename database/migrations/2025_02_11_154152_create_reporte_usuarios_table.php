<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reporte_usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Relación con el usuario
            $table->foreignId('reporte_id')->constrained()->onDelete('cascade');  // Relación con el reporte
            $table->string('estado_asignado')->default('pendiente');  // Estado del reporte asignado
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reporte_usuarios');
    }
};
