<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nome');
            $table->date('Nascimento');
            $table->enum('EstadoCivil', ['Solteiro', 'Casado', 'Viuvo', 'Divorciado'])->nullable();
            $table->string('Celular');
            $table->string('TelefoneFixo');
            $table->string('Email');
            $table->string('Cargo');
            $table->string('Setor');
            $table->longText('Observacao')->nullable();
            $table->enum('Inativo', ['Sim', 'Nao']);
            $table->integer('idUnidade');
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
        Schema::dropIfExists('funcionario');
    }
}
