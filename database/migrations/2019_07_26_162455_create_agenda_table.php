<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('Prioridade', ['Baixa', 'Média', 'Alta']);
            $table->date('Data');
            $table->time('Hora');
            $table->string('Assunto');
            $table->text('Tarefa');
            $table->enum('Resolvido', ['Não', 'Aguardo outros', 'Aguardo finanças', 'Sim']);
            $table->enum('Arquivado', ['Sim', 'Não']);
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
        Schema::dropIfExists('agenda');
    }
}
