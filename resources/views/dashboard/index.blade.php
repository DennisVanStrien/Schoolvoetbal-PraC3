<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(auth()->user()->role === 'user' || auth()->user()->role === 'referee')
                <div class="bg-blue-500 text-white p-6 mt-4 rounded-lg shadow-lg">
                    <h3 class="text-lg font-bold mb-2">Welkom {{ Auth::user()->name }}</h3>
                    @if (Auth::user()->team)
                        <p class="text-sm">Jouw team: <span class="font-semibold">{{ Auth::user()->team->name }}</span> (ID: {{ Auth::user()->team_id }})</p>
                    @else
                        <p class="text-sm">Je hebt nog geen team. <a href="#" class="underline text-blue-300">Ga naar de teams pagina</a> om er een aan te maken.</p>
                    @endif
                </div>
            @elseif(auth()->user()->role === 'admin')
                <div class="bg-blue-500 text-white p-6 mt-4 rounded-lg shadow-lg">
                    <h3 class="text-lg font-bold mb-2">Welkom {{ Auth::user()->name }}</h3>
                    <p class="text-gray-200 text-sm mb-6">Je bent een admin. Hier kun je teams en gebruikers beheren.</p>
                    @if (Auth::user()->team)
                        <p class="text-sm">Jouw team: <span class="font-semibold">{{ Auth::user()->team->name }}</span> (ID: {{ Auth::user()->team_id }})</p>
                    @else
                        <p class="text-sm">Je hebt nog geen team. <a href="#" class="underline text-blue-300">Ga naar de teams pagina</a> om er een aan te maken.</p>
                    @endif

                    <div class="mt-6">
                        <h1 class="text-xl font-semibold mb-4">Mijn Toernooien</h1>
                        @if ($tournaments->isEmpty())
                            <p class="text-sm">Je bent nog niet ingeschreven voor een toernooi.</p>
                        @else
                            <ul class="list-disc pl-6 text-gray-800 dark:text-gray-200 space-y-2">
                                @foreach ($tournaments as $tournament)
                                    <li class="text-base font-medium dark:text-gray-200">{{ $tournament->title }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @else
                <div class="bg-red-500 text-white p-6 mt-4 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold">Geen Toegang</h3>
                    <p class="text-sm">Uw rol kon niet worden gevonden door ons systeem. Neem contact op met een beheerder.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
