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
            $table->bigIncrements('id');
            $table->string('Nome');
            $table->enum('Sexo', ['Masculino', 'Feminino']);
            $table->date('NascimentoAluno');
            $table->enum('EstadoCivilAluno', ['Solteiro', 'Casado', 'Divorciado', 'Desquitado', 'Viuvo']);
            $table->string('ProfissaoAluno');
            $table->string('RgAluno');
            $table->string('CpfAluno');
            $table->string('Escolaridade');
            $table->string('Email');
            $table->string('Curso');
            $table->string('Turma');
            $table->string('Parcelamento');
            $table->string('Vencimento');
            $table->string('Mae');
            $table->string('Pai');
            $table->string('Conheceu');
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
        Schema::dropIfExists('aluno');
    }
}
