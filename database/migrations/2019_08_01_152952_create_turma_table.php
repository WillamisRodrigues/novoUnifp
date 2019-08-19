<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('idCurso');
            $table->string('NomeTurma');
            $table->date('DiasDaSemana');
            $table->enum('Periodo', ['Manha', 'Tarde', 'Noite']);
            $table->time('Horario');
            $table->date('DataInicio');
            $table->date('DataTermino');
            $table->string('DuracaoAulas');
            $table->string('Professor');
            $table->integer('Vagas');
            $table->string('Cronograma');
            $table->enum('Status',['Ativa', 'Inativa']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('idCurso')->references('id')->on('curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma');
    }
}
