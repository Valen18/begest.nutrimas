<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->float('peso', 6, 2)->nullable();
            $table->float('grasa', 6, 2)->nullable();
            $table->float('liquido', 6, 2)->nullable();
            $table->float('musculo', 6, 2)->nullable();
            $table->float('metabolismo', 6, 2)->nullable();
            $table->float('g_visceral', 6, 2)->nullable();
            $table->float('indice', 6, 2)->nullable();
            $table->float('edad_fisica', 6, 2)->nullable();
            $table->float('c_pecho', 6, 2)->nullable();
            $table->float('c_cintura', 6, 2)->nullable();
            $table->float('c_cadera', 6, 2)->nullable();
            $table->float('c_brazos', 6, 2)->nullable();
            $table->float('c_piernas', 6, 2)->nullable();
            $table->float('imagen', 6, 2)->nullable();
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
        Schema::dropIfExists('mediciones');
    }
}
