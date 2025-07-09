<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_cliente');
            $table->string('numero_contacto');
            $table->string('prenda');
            $table->decimal('valor_a_pagar', 10, 2);
            $table->dateTime('fecha_recibido');
            $table->date('fecha_entrega');
            $table->text('observaciones')->nullable();

            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
