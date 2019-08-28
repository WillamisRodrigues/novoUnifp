<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Fornecedor');
            $table->string('NomeFantasia')->nullable();
            $table->string('CNPJ')->nullable();
            $table->string('Endereco');
            $table->string('Bairro')->nullable();
            $table->string('Cidade')->nullable();
            $table->string('UF')->nullable();
            $table->string('Email');
            $table->string('Telefone1');
            $table->string('Telefone2')->nullable();
            $table->string('PessoaContato')->nullable();
            $table->longText('Observacao')->nullable();
            $table->date('DataCadastro');
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
        Schema::dropIfExists('fornecedor');
    }
}
