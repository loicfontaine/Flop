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
        Schema::create('option_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("option_id")->unsigned();
            $table->foreign("option_id")
                ->references("id")
                ->on("options")
                ->onDelete("restrict")
                ->onUpdate("restrict");
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("restrict")
                ->onUpdate("restrict");
            $table->unique(['option_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_user');
    }
};
