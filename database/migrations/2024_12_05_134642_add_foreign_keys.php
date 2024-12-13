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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('set null');
        });

        Schema::table('tournament_teams', function (Blueprint $table) {
            $table->foreign('tournament_id')->references("id")->on('tournaments');
            $table->foreign('team_id')->references("id")->on('teams');
        });

        Schema::table('games', function (Blueprint $table) {
            $table->foreign('tournament_id')->references("id")->on('tournaments');
            $table->foreign('team_1')->references("id")->on('teams')->onDelete('set null');
            $table->foreign('team_2')->references("id")->on('teams')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
