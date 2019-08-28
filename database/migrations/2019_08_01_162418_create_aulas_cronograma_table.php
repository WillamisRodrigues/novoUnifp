<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulasCronogramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas_cronograma', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NomeAula')->nullable();
            $table->integer('idCronograma');
            $table->date('DataAula');
            $table->date('DataTermino');
            $table->string('DiasSemana');
            $table->longText('Planejamento')->nullable();
            $table->longText('RelatorioProfessor')->nullable();
            $table->integer('idUnidade')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aulas_cronograma');
    }
}
