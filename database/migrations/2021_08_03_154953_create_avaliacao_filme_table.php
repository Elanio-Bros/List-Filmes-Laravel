<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoFilmeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_filme', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user')->references('idUser')->on('users');
            $table->foreignId('filme')->references('idFilme')->on('filmes');
            $table->string('comentario');
            $table->integer('pontuação');
            $table->integer('curtidas');
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
        Schema::dropIfExists('avaliacao_filme');
    }
}
