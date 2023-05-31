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
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title", 150);
            $table->integer("poll_id")->unsigned();
            $table->foreign("poll_id")
                ->references("id")
                ->on("polls")
                ->onDelete("restrict")
                ->onUpdate("restrict");
            $table->integer("song_id")->unsigned()->nullable();
            $table->foreign("song_id")
                ->references("id")
                ->on("songs")
                ->onDelete("restrict")
                ->onUpdate("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
