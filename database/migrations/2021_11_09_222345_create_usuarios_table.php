<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nome');
            $table->string('usuario')->unique();
            $table->string('email')->unique();
            $table->longText('senha');
            // $table->enum('tipo_perfil',['url','file'])->default('file');
            $table->text('url_perfil')->default('img/img_user/default.png');
            $table->string('token_api',25)->unique();
            $table->enum('tipo', ['Admin', 'Gerente', 'Normal']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
