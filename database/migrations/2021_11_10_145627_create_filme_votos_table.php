<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmeVotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filme_votos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('voto');
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->cascadeOnDelete();
            $table->unsignedInteger('id_filme');
            $table->foreign('id_filme')->references('id')->on('filmes')->cascadeOnDelete();
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
        Schema::dropIfExists('filme_votos');
    }
}
