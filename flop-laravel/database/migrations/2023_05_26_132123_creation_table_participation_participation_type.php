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
        Schema::create('participation_participation_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("participation_id")->unsigned();
            $table->integer("participation_type_id")->unsigned();
            $table->foreign("participation_id")->references("id")->on("participations")
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
        Schema::dropIfExists('participation_participation_type');
    }
};
