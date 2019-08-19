<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idCurso');
            $table->string('NomeContrato');
            $table->longText('Contrato');
            $table->float('Matricula', 8, 2);
            $table->float('MultaContrato', 8, 2);
            $table->float('MoraContrato', 8, 2);
            $table->float('Multa', 8, 2);
            $table->float('Mora', 8, 2);
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('idCurso')->references('id')->on('curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
