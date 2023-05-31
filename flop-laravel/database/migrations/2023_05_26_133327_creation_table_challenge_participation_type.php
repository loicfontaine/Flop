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
        Schema::create('challenge_participation_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("challenge_id")->unsigned();
            $table->integer("participation_type_id")->unsigned();
            $table->foreign("challenge_id")->references("id")->on("challenges")
                ->onDelete("restrict")
                ->onUpdate("restrict");
            $table->foreign("participation_type_id")->references("id")->on("participation_types")
                ->onDelete("restrict")
                ->onUpdate("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_participation_type');
    }
};
