<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaixaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caixa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Tipo');
            $table->string('Via');
            $table->string('FormaPgto');
            $table->enum('Status', ['Pago', 'FaltaPagar']);
            $table->longText('Descricao');
            $table->string('Aluno');
            $table->date('Lancamento');
            $table->date('Vencimento');
            $table->float('Valor', 8, 2);
            $table->string('CentroCusto');
            $table->string('ContaCaixa');
            $table->string('Usuario');
            $table->timestamp('Data');
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
        Schema::dropIfExists('caixa');
    }
}
