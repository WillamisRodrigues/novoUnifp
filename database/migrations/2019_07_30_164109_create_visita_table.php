<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visita', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('telefone');
            $table->string('email');
            $table->longText('observacao');
            $table->date('dataRetorno');
            $table->time('horaRetorno');
            $table->enum('comoConheceu', ['Facebook','Indicacao','Jornal','Outdoor','Panfletagem','Popup','Radio','Revista','Piq','Internet']);
            $table->date('dataAtendimento');
            $table->enum('status', ['Agendado','SemInteresse','Retornado','RetornarContato','Desligado']);
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
        Schema::dropIfExists('visita');
    }
}
