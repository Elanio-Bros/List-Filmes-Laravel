<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaFilmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_filmes', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias')->cascadeOnDelete();
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
        Schema::dropIfExists('categorias_filmes');
    }
}
