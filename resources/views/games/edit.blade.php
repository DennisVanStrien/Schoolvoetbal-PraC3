<x-base-layout>
    <h1>Wedstrijden Bewerken voor {{ $game->team_1 }} vs {{ $game->team_2 }}</h1>

    <form action="{{ route('games.update', $game->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="team_1_score">Score Team 1</label>
            <input type="number" name="team_1_score" value="{{ old('team_1_score', $game->team_1_score) }}" required>
        </div>

        <div>
            <label for="team_2_score">Score Team 2</label>
            <input type="number" name="team_2_score" value="{{ old('team_2_score', $game->team_2_score) }}" required>
        </div>

        <button type="submit">Opslaan</button>
    </form>

    <a href="{{ route('tournaments.index', $game->tournament_id) }}" class="btn btn-secondary">Terug naar Toernooien</a>
</x-base-layout>
