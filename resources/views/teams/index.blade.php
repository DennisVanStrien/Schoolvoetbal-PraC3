<x-base-layout>
    <!-- Titel -->
    <div class="flex justify-center mb-6">
        <h1 class="font-bold text-2xl text-gray-800 dark:text-gray-200">Alle teams:</h1>
    </div>

    <!-- Grid container voor teams -->
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($teams as $team)
                <!-- Individuele kaart voor een team -->
                <div class="border rounded-lg shadow p-4 text-center bg-white dark:bg-gray-800">
                    <p class="font-bold text-lg text-gray-800 dark:text-gray-200">Team naam: {{$team->name}}</p>
                    <p class="text-gray-600 dark:text-gray-400">Team id: {{$team->id}}</p>
                    <a href="{{ route('teams.goToEditPage', $team->id)}}"
                       class="underline text-blue-500 hover:text-blue-600 text-sm">
                        Klik om team te bekijken
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Link om een nieuw team aan te maken -->
    @auth
        <div class="flex justify-center mt-6">
            <a href="/teams/create"
               class="text-blue-500 underline hover:text-blue-600">
                Maak een nieuw team aan
            </a>
        </div>
    @endauth
</x-base-layout>
