<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->bigIncrements('numeroDocumento');
            $table->bigInteger('Matricula');
            $table->integer('Parcela');
            $table->enum('Referencia', ['Matricula', 'Mensalidade']);
            $table->date('Vencimento');
            $table->enum('Status', ['Aberto', 'Quitado', 'Vencido']);
            $table->string('Forma')->nullable();
            $table->date('DataPgto')->nullable();
            $table->float('Multa', 8, 2)->nullable();
            $table->float('Valor', 8, 2)->nullable();
            $table->string('Usuario')->nullable();
            $table->timestamp('Data')->nullable();
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
        Schema::dropIfExists('pagamentos');
    }
}
