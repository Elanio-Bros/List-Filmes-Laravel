<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosGrupoFilmeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios_grupo_filme', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->cascadeOnDelete();
            $table->unsignedInteger('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('grupos_comentario')->cascadeOnDelete();
            $table->longText('comentario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios_groupo_filme');
    }
}
