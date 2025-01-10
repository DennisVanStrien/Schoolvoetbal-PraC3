<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tournament;
use App\Models\Tournament_team;
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

    public function goToEditPage(Tournament $tournament)
    {
        // De specifieke toernooi ophalen die je wilt bewerken
        return view('tournaments.edit')->with('tournament', $tournament);
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();

        return redirect()->route('tournaments.index')->with('success', 'Tournament Verwijdert');
    }

    public function ChangeStartDate(Tournament $tournament, Request $request)
    {
        $tournament->started = $request->time;
        $tournament->save();

        return redirect()->route('tournaments.index');
    }




    public function generateSchedule(Tournament $tournament)
    {
    // Haal de teams op die bij dit toernooi horen
    $teams = $tournament->teams;

    // Controleer of er voldoende teams zijn
    if ($teams->count() < 2) {
        return redirect()->back()->with('error', 'Niet genoeg teams om wedstrijden in te plannen.');
    }

    // Controleer of er al wedstrijden bestaan
    if (Game::where('tournament_id', $tournament->id)->exists()) {
        return redirect()->back()->with('error', 'Er zijn al wedstrijden gegenereerd voor dit toernooi.');
    }

    // Genereer alle mogelijke wedstrijden
    foreach ($teams as $index1 => $team1) {
        for ($index2 = $index1 + 1; $index2 < $teams->count(); $index2++) {
            $team2 = $teams[$index2];

            // Zorg ervoor dat een team niet tegen zichzelf speelt
            if ($team1->id != $team2->id) {
                // Handmatig instellen van tournament_id in plaats van mass assignment
                $game = new Game();
                $game->tournament_id = $tournament->id;
                $game->team_1 = $team1->id;
                $game->team_2 = $team2->id;
                $game->team_1_score = 0;
                $game->team_2_score = 0;
                $game->save();
            }
        }
    }

    // Redirect naar de pagina met een succesmelding
    return redirect()->route('tournaments.index')->with('success', 'Wedstrijden succesvol gegenereerd!');
    }

    public function showGames(Tournament $tournament)
    {
    // Haal alle games op voor het specifieke toernooi
    $games = Game::where('tournament_id', $tournament->id)->get();


    return view('tournaments.games')
    ->with('tournament', $tournament)
    ->with('games', $games);
    }








}
