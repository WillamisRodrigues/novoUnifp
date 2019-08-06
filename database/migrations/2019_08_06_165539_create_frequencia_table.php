<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrequenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequencia', function (Blueprint $table) {
            $table->bigIncrements('idFrequencia');
            $table->bigInteger('idAluno'); //matricula
            $table->bigInteger('idTurma')->nullable();
            $table->bigInteger('idAula')->nullable();
            $table->tinyInteger('Frequencia')->default(0); //0 - falta, 1 - compareceu
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
        Schema::dropIfExists('frequencia');
    }
}
