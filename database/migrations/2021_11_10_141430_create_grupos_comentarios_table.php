<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_comentario', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('titulo');
            $table->unsignedInteger('id_filme');
            $table->foreign('id_filme')->references('id')->on('filmes')->cascadeOnDelete();
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->cascadeOnDelete();
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
        Schema::dropIfExists('grupos_comentario');
    }
}
