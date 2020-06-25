<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->id();
            $table->integer('Codigo');
            $table->string('Nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('areaLaboral');
            $table->string('puesto');
            $table->string('Institucion');

            // $table->string('cursoCap');
            // $table->string('nombreInstructor');
            // $table->integer('fechaInicial');
            // $table->integer('fechaFinal');
            // $table->integer('horas');

            
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
        Schema::dropIfExists('curso');
    }
}
