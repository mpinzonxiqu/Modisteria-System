<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('reportes')) {
            Schema::create('reportes', function (Blueprint $table) {
                $table->id();
                $table->string('NombreReporte');
                $table->text('URL');  // Aquí usamos 'text' para asegurarnos de que la URL encriptada quepa
                $table->text('Descripcion');
                $table->string('Estado')->default('activo');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
