<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronogramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronograma', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nome');
            $table->string('idAulasCronograma');
            $table->integer('idUnidade');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('idAulasCronograma')->references('id')->on('aulas_cronograma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cronograma');
    }
}
