<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDataTable extends Migration
{
    public function up()
    {
        Schema::create('event_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events'); 
            $table->string('status')->default('registered');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_data');
    }
}
