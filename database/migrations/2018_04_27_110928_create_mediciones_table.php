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
            $table->float('peso', 4, 2)->nullable();
            $table->float('grasa', 4, 2)->nullable();
            $table->float('liquido', 4, 2)->nullable();
            $table->float('musculo', 4, 2)->nullable();
            $table->float('metabolismo', 4, 2)->nullable();
            $table->float('g_visceral', 4, 2)->nullable();
            $table->float('indice', 4, 2)->nullable();
            $table->float('edad_fisica', 4, 2)->nullable();
            $table->float('c_pecho', 4, 2)->nullable();
            $table->float('c_cintura', 4, 2)->nullable();
            $table->float('c_cadera', 4, 2)->nullable();
            $table->float('c_brazos', 4, 2)->nullable();
            $table->float('c_piernas', 4, 2)->nullable();
            $table->float('imagen', 4, 2)->nullable();
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
