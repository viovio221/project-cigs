<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('history')->nullable();
            $table->text('community_bio')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('video1')->nullable();
            $table->string('video2')->nullable();
            $table->text('community_structure')->nullable();
            $table->string('slogan', 100)->nullable();
            $table->string('community_name', 100)->nullable();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
