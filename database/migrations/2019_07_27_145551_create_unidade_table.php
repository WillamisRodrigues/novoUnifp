<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidade', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NomeUnidade');
            $table->string('CNPJ');
            $table->string('Endereco');
            $table->string('Bairro');
            $table->string('Cidade');
            $table->string('UF');
            $table->string('Telefone1');
            $table->string('Telefone2')->nullable();
            $table->enum('Tipo', ['Propria', 'Franquia']);
            $table->string('Logotipo')->nullable();
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
        Schema::dropIfExists('unidade');
    }
}
