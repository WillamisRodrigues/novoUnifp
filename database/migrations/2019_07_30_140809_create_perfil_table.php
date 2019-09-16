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
            $table->string('perfilAcesso')->unique(); // Administrador, Gerente, Supervisor, Gestor, Secretaria, Professor, Comercial, Atendimento
            $table->integer('nivelAcesso')->unique(); // 0 - Adm, 1 - Gerente, 2 - Supervisor, 3 - Gestor, 4 - Secretaria, 5 - Prof, 6 - Comercial, 7 - Atendimento
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
