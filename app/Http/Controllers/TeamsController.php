<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams.index')->with('teams',$teams);
    }

    public function indexTeam()
    {
        $teams = Team::all();
        return view('teams.create')->with('teams',$teams);
    }

    public function create(){
        return view('teams.create');
   }

   public function store(Request $request)
        {
    // Maak een nieuw team aan
    $newTeam = new Team();
    $newTeam->name = $request->name;
    $newTeam->save();

    // Stel de team_id van de huidige gebruiker (speler) in
    $user = auth()->user(); // Haal de ingelogde gebruiker op
    $user->team_id = $newTeam->id; // Koppel het team aan de gebruiker
    $user->save(); // Sla de wijziging op

    // Redirect naar de teams index pagina
    return redirect()->route('teams.index');
    }

   public function goToEditPage(Team $team){
        $players = json_decode($team->players, true);

        return view('teams.edit', ['team' => $team, 'players' => $players]);
    }

    public function addPlayers(Request $request, Team $team)
    {
        // Haal de bestaande spelers op of gebruik een lege array als er geen zijn
        $players = json_decode($team->players, true) ?: [];

        // Voeg de nieuwe speler toe aan de lijst
        $players[] = $request->input('player');

        // Update de spelerslijst en sla het op als JSON
        $team->players = json_encode($players);
        $team->save();

        // Redirect terug
        return redirect()->route('teams.goToEditPage', ['team' => $team, 'players' => $players]);
    }

    public function deletePlayer(Request $request, Team $team)
    {
    // Haal de bestaande spelers op of gebruik een lege array
    $players = json_decode($team->players, true) ?: [];

    // Haal de naam van de speler op die verwijderd moet worden
    $playerToDelete = $request->input('player');

    // Zoek de speler in de lijst en verwijder deze
    $players = array_filter($players, function ($player) use ($playerToDelete) {
        return $player !== $playerToDelete;
    });

    // Update de spelerslijst en sla het op als JSON
    $team->players = json_encode(array_values($players)); // Zorg dat het een geordende array blijft
    $team->save();

    // Redirect terug
    return redirect()->route('teams.goToEditPage', ['team' => $team]);
    }

    public function destroy(Team $team)
    {
        // Verwijder het team
        $team->delete();

        // Redirect terug naar de teams overzicht met een succesbericht
        return redirect()->route('teams.index')->with('success', 'Team succesvol verwijderd!');
    }



}
