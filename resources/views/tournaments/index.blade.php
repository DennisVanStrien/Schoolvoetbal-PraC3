<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @guest
        <p class="flex justify-center">Je moet ingelogd zijn om je in te schrijven</p>
    @endguest

    <!-- Container voor toernooien -->
    <div class="container mx-auto px-4 py-6">
        <!-- Grid layout voor de toernooi kaarten -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($tournaments as $tournament)
                <div class="border rounded-lg shadow p-4 text-center bg-white dark:bg-gray-800">
                    <p class="font-bold text-lg text-gray-800 dark:text-gray-200">Toernooi naam: {{$tournament->title}}</p>
                    <p class="text-gray-600 dark:text-gray-400">Maximaal aantal teams: {{$tournament->max_teams}}</p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Dit toernooi is aangemaakt op: {{$tournament->started}}</p>

                    @auth
                        <form method="POST" action="{{ route('tournament.team.create', $tournament->id) }}" class="mt-4">
                            @csrf
                            <input type="hidden" name="tournament_id" value="{{ $tournament->id }}">
                            <button type="submit" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Inschrijven
                            </button>
                        </form>
                        @if(auth()->user()->role === 'admin')
                            <!--Hier komt de START TOURNAMENT KNOP-->
                        @else
                            <!--Hier komt niks want als je geen admin bent krijg je geen start knop. niks -->
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
