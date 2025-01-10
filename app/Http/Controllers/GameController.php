<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function edit(Game $game)
    {
        // Geef de specifieke game terug naar de view
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        // Valideer de input
        $request->validate([
            'team_1_score' => 'required|integer',
            'team_2_score' => 'required|integer',
        ]);

        // Werk de scores bij
        $game->team_1_score = $request->input('team_1_score');
        $game->team_2_score = $request->input('team_2_score');
        $game->save();

        // Redirect terug naar het toernooi
        return redirect()->route('tournaments.showGames', $game->tournament_id)->with('success', 'Scores bijgewerkt!');
    }
}
