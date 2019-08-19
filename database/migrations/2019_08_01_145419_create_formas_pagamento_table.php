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
            $table->increments('id');
            $table->integer('QtdeParcelas');
            $table->float('BrutoTotal', 8, 2);
            $table->float('ParcelaBruta', 8, 2);
            $table->float('DescontoPontualidade', 8, 2);
            $table->float('ParcelaDescontoPontualidade', 8, 2);
            $table->float('ValorTotalDesconto', 8, 2);
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
