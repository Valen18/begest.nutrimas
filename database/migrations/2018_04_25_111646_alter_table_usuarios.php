<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->date('fecha_nac')->nullable();
            $table->string('sexo')->nullable();
            $table->string('altura')->nullable();
            $table->string('act_lab')->nullable();
            $table->string('act_dep')->nullable();
            $table->string('deportes')->nullable();
            $table->string('vegetariano')->nullable();
            $table->string('como')->nullable();
            $table->text('desayuno')->nullable();
            $table->text('mmanana')->nullable();
            $table->text('almuerzo')->nullable();
            $table->text('merienda')->nullable();
            $table->text('cena')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn('fecha_nac');
            $table->dropColumn('sexo');
            $table->dropColumn('altura');
            $table->dropColumn('act_lab');
            $table->dropColumn('act_dep');
            $table->dropColumn('deportes');
            $table->dropColumn('vegetariano');
            $table->dropColumn('como');
            $table->dropColumn('desayuno');
            $table->dropColumn('mmanana');
            $table->dropColumn('almuerzo');
            $table->dropColumn('merienda');
            $table->dropColumn('cena');
        });
    }
}
