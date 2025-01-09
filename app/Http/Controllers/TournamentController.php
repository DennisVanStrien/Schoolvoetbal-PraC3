<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\tournament_team;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function goToCreatePage()
    {
        return view('tournaments.create');
    }

    public function createTournament(Request $request)
    {
        $newTournament = new Tournament();
        $newTournament->title = $request->title;
        $newTournament->max_teams = $request->maxTeams;
        $newTournament->save();
        return redirect()->route('tournaments.index');
    }

    public function indexTournament()
    {
        $tournaments = Tournament::all();
        return view('tournaments.index')->with('tournaments', $tournaments);
    }

    public function joinTournament(Request $request)
    {
        // Maak een nieuw record in de 'tournament_team' tabel
        $newTournamentTeam = new tournament_team();

        // Koppel het team_id van de ingelogde gebruiker
        $newTournamentTeam->team_id = auth()->user()->team_id;

        // Koppel het tournament_id van het geselecteerde toernooi
        $newTournamentTeam->tournament_id = $request->tournament_id;

        // Sla de inschrijving op
        $newTournamentTeam->save();

        // Redirect naar de toernooienpagina met een succesbericht
        return redirect()->route('tournaments.index')->with('success', 'Je bent succesvol ingeschreven voor het toernooi!');
    }
}
