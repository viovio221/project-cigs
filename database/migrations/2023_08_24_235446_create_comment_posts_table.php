<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comment_posts', function (Blueprint $table) {
            $table->id('id');
            $table->string('username');
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->string('content');
            $table->integer('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_posts');
    }
};
