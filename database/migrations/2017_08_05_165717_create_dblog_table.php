<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDblogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('env');
            $table->string('message', 500);
            $table->enum('level', [
                'DEBUG',
                'INFO',
                'NOTICE',
                'WARNING',
                'ERROR',
                'CRITICAL',
                'ALERT',
                'EMERGENCY'
            ])->default('INFO');
            $table->text('context');
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
        //
    }
}
