

<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_reporte_area_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_area', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_de_trabajo_id')->constrained('area_de_trabajos')->onDelete('cascade');
            $table->foreignId('reporte_id')->constrained('reportes')->onDelete('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reporte_area');
    }
}	



