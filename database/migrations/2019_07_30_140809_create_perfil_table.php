<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreatePerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('perfilAcesso')->unique(); // Administrador, Supervisor, Gestor, Secretaria, Professor, Comercial, Atendimento
            $table->integer('nivelAcesso'); // 0 - Adm, 1 - Supervisor, 2 - Gestor, 3 - Secretaria, 4 - Prof, 5 - Comercial, 6 - Atendimento
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfil');
    }
}
