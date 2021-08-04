<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arquivos', function (Blueprint $table) {
            $table->id('idArquivo');
            $table->foreignId('filme')->references('IdFilme')->on('filmes');
            $table->enum('propriedade', ['foto', 'video', 'capa']);
            $table->string('local');
            $table->enum('tipo', ['url', 'file', 'yotube']);
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
        Schema::dropIfExists('arquivos');
    }
}
