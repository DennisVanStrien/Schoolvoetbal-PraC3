<x-base-layout>
    <div class="flex justify-center mb-6 mt-2">
        <p class="font-bold text-2xl mr-2">Team naam:</p>
        <p class="text-2xl text-gray-700">{{ $team->name }}</p>
    </div>

    <!-- Container voor spelers -->
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg mx-auto">
        <h2 class="text-center font-bold text-xl text-gray-800 mb-4">Team spelers:</h2>

        <!-- Spelerslijst -->
        @if (!empty($players))
            <div class="space-y-2">
                @foreach ($players as $player)
                    <div class="flex items-center p-2 border-2 border-gray-300 rounded-md">
                        <i class="fa-solid fa-user text-gray-600"></i>
                        <p class="text-lg text-gray-700 ml-2">{{ $player }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-lg text-gray-600">Dit team is momenteel nog leeg.</p>
        @endif
    </div>

    @auth
        @if (auth()->user()->team_id == $team->id || auth()->user()->role === 'admin')
            <!-- Spelers toevoegen -->
            <div class="mt-6 max-w-lg mx-auto">
                <h2 class="text-center font-bold text-lg text-gray-800 mb-4">Spelers beheren:</h2>
                <div class="flex flex-col items-center space-y-4">
                    <!-- Toevoegen formulier -->
                    <form action="{{ route('teams.addPlayers', $team->id) }}" method="POST" class="w-full">
                        @csrf
                        <div class="flex items-center space-x-2">
                            <input type="text" name="player" placeholder="Voer spelernaam in"
                                   class="flex-grow border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                            <button type="submit"
                                    class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-md hover:bg-blue-600">
                                Voeg toe
                            </button>
                        </div>
                    </form>

                    <!-- Verwijderen formulier -->
                    <form action="{{ route('teams.deletePlayer', $team->id) }}" method="POST" class="w-full">
                        @csrf
                        <div class="flex items-center space-x-2">
                            <input type="text" name="player" placeholder="Naam van speler om te verwijderen"
                                   class="flex-grow border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
                            <button type="submit"
                                    class="bg-red-500 text-white font-semibold px-4 py-2 rounded-md hover:bg-red-600">
                                Verwijder
                            </button>
                        </div>
                    </form>

                    <!-- Team verwijderen -->
                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST"
                          onsubmit="return confirm('Weet je zeker dat je dit team wilt verwijderen? Dit kan niet worden ongedaan.');" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-600 text-white font-semibold w-full py-2 rounded-md hover:bg-red-700">
                            Verwijder team
                        </button>
                    </form>
                </div>
            </div>

            <!-- Admin boodschap -->
            @if (auth()->user()->role === 'admin')
                <div class="mt-12 max-w-lg mx-auto text-center">
                    <h2 class="font-bold text-lg text-gray-800">Admin rol:</h2>
                    <p class="text-gray-600">U kunt dit team bewerken. Houd wel in gedachten dat u niet de beheerder bent van dit team. Maak hier geen misbruik van.</p>
                </div>
            @endif
        @endif
    @endauth
</x-base-layout>
