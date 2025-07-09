<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('automoviles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_propietario');
            $table->string('placa')->unique();
            $table->string('tipo_vehiculo'); // 👈 Nuevo campo
            $table->string('marca');
            $table->string('modelo');
            $table->string('color')->nullable();
            $table->dateTime('fecha_hora_llegada');
         
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('automoviles');
    }
};

