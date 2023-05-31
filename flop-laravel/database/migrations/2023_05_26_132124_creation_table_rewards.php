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
        Schema::create('rewards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->integer("article_id")->unsigned();
            $table->integer("user_id")->unsigned();
            $table->integer("participation_id")->unsigned();
            $table->foreign("article_id")
                ->references("id")
                ->on("articles")
                ->onDelete("restrict")
                ->onUpdate("restrict");
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("restrict")
                ->onUpdate("restrict");
            $table->foreign("participation_id")
                ->references("id")
                ->on("participations")
                ->onDelete("restrict")
                ->onUpdate("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards');
    }
};
