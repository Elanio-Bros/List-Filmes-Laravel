<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosGroupoFilmeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios_groupo_filme', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->cascadeOnDelete();
            $table->unsignedInteger('id_groupo');
            $table->foreign('id_groupo')->references('id')->on('grupos_comentario')->cascadeOnDelete();
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
