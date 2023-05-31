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
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text("content");
            $table->timestamp("time");
            $table->integer("user_id")->unsigned();

            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("restrict")
                ->onUpdate("restrict");
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
