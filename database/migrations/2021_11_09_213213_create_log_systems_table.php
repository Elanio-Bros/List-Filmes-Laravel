<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_system', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('level', [
                'EMERGENCY',
                'ALERT',
                'CRITICAL',
                'ERROR',
                'WARNING',
                'NOTICE',
                'INFO',
                'DEBUG'
            ])->default('INFO');
            $table->longText('message');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_system');
    }
}
