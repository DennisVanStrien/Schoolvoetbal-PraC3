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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id')->constrained();
            $table->unsignedBigInteger('team_1')->constrained();
            $table->unsignedBigInteger('team_2')->constrained();
            $table->unsignedInteger('team_1_score');
            $table->unsignedInteger('team_2_score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
