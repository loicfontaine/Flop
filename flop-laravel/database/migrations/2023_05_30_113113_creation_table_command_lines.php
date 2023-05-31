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
        Schema::create('command_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->integer("order_id")->unsigned();
            $table->integer("article_id")->unsigned();
            $table->foreign("order_id")
                ->references("id")
                ->on("orders")
                ->onDelete("restrict")
                ->onUpdate("restrict");
            $table->foreign("article_id")
                ->references("id")
                ->on("articles")
                ->onDelete("restrict")
                ->onUpdate("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('command_lines');
    }
};
