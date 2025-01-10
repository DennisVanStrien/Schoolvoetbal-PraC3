<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\Tournament_team;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function users()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function tournaments()
    {
        $tournaments = Tournament::all();
        return response()->json($tournaments);
    }

    public function tournamentsTeams()
    {
        $tournamentsTeams = Tournament_team::all();
        return response()->json($tournamentsTeams);
    }

    public function teams()
    {
        $teams = Team::all();
        return response()->json($teams);
    }

    public function games()
    {
        $games = Game::all();
        return response()->json($games);
    }
}
