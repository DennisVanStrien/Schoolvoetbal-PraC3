<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function goToDashboard()
    {
        $user = auth()->user();

        // Haal alle teams op
        $teams = Team::all();

        // Haal alle toernooien op waarvoor de ingelogde gebruiker is ingeschreven
        $tournaments = Tournament::whereHas('teams', function ($query) use ($user) {
            $query->where('team_id', $user->team_id);
        })->get();

        // Geef zowel de teams als de toernooien door aan de view
        return view('dashboard.index')->with(['teams' => $teams, 'tournaments' => $tournaments]);
    }

}
