<x-base-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-4xl p-6 bg-white rounded-lg">
            <h1 class="text-2xl font-bold mb-4 text-center">Wedstrijden voor {{ $tournament->title }}</h1>
            <p class="text-lg mb-4 text-center">Max Teams: {{ $tournament->max_teams }}</p>

            @if ($games->isEmpty())
                <p class="text-center text-lg text-gray-600">Er zijn nog geen wedstrijden ingepland voor dit toernooi.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse border border-gray-300 mx-auto">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="px-4 py-2 border-b">Team 1</th>
                                <th class="px-4 py-2 border-b">Team 2</th>
                                <th class="px-4 py-2 border-b">Score Team 1</th>
                                <th class="px-4 py-2 border-b">Score Team 2</th>
                                @if(auth()->user()->role == 'admin' || auth()->user()->role == 'referee')
                                    <th class="px-4 py-2 border-b">Acties</th> <!-- Kolom voor bewerken -->
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($games as $game)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border-b">{{ $game->team_1 }}</td>
                                    <td class="px-4 py-2 border-b">{{ $game->team_2 }}</td>
                                    <td class="px-4 py-2 border-b">{{ $game->team_1_score }}</td>
                                    <td class="px-4 py-2 border-b">{{ $game->team_2_score }}</td>

                                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'referee')
                                        <td class="px-4 py-2 border-b">
                                            <!-- Edit knop die naar de bewerkpagina van de game leidt -->
                                            <a href="{{ route('games.edit', $game->id) }}" class="inline-block bg-blue-500 text-white py-1 px-4 rounded hover:bg-blue-600 transition">Bewerken</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="mt-6 text-center">
                <a href="{{ route('tournaments.index') }}" class="inline-block bg-gray-500 text-white py-2 px-6 rounded hover:bg-gray-600 transition">Terug naar Toernooien</a>
            </div>
        </div>
    </div>
</x-base-layout>
