<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormasPagamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formas_pagamento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('QtdeParcelas');
            $table->float('BrutoTotal');
            $table->float('ParcelaBruta');
            $table->float('DescontoPontualidade');
            $table->float('ParcelaDescontoPontualidade');
            $table->float('ValorTotalDesconto');
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
        Schema::dropIfExists('formas_pagamento');
    }
}
