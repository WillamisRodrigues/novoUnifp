<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nome');
            $table->enum('Sexo', ['Masculino', 'Feminino']);
            $table->date('NascimentoAluno');
            $table->enum('EstadoCivilAluno', ['Solteiro', 'Casado', 'Divorciado', 'Desquitado', 'Viuvo']);
            $table->string('ProfissaoAluno');
            $table->string('RgAluno');
            $table->string('CpfAluno');
            $table->string('Escolaridade');
            $table->string('Email');
            $table->integer('idCurso');
            $table->integer('idTurma');
            // $table->integer('idParcelamento');
            $table->string('Vencimento');
            $table->string('Mae');
            $table->string('Pai');
            $table->string('Conheceu');
            $table->string('Vendedor');
            $table->date('DataCadastro');
            $table->string('Parentesco');
            $table->string('Pagador');
            $table->date('NascimentoContratante');
            $table->enum('EstadoCivilContratante', ['Solteiro', 'Casado', 'Divorciado', 'Desquitado', 'Viuvo']);
            $table->string('ProfissaoContratante');
            $table->string('RgContratante');
            $table->string('CpfContratante');
            $table->string('Endereco');
            $table->string('Bairro');
            $table->string('Cidade');
            $table->string('UF');
            $table->string('CEP');
            $table->string('Telefone');
            $table->string('Celular1');
            $table->string('Celular2');
            $table->string('Usuario_id');
            $table->enum('Status', ['Estudando', 'Trancado', 'Desistente', 'Concluido', 'Abandono']);
            $table->integer('idUnidade')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('idCurso')->references('id')->on('curso');
            // $table->foreign('idTurma')->references('id')->on('turma');
            // $table->foreign('idParcelamento')->references('id')->on('formas_pagamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno');
    }
}
