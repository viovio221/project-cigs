<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresenceTable extends Migration
{
    public function up()
    {
        Schema::create('presence', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('checkin');
            $table->string('images')->nullable();
            $table->foreignId('event_data_id')->constrained('event_data');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('presence');
    }
}

