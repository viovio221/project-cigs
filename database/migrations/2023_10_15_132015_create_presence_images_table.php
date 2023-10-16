<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresenceImagesTable extends Migration
{
    public function up()
    {
        Schema::create('presence_images', function (Blueprint $table) {
            $table->id();
            $table->mediumText('image_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presence_images');
    }
}
