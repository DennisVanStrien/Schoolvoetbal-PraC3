<x-base-layout>
    <div class="flex justify-center flex-row">
        <h1 class="font-bold text-lg">Alle teams:</h1>
    </div>
    <div class="flex flex-col items-center space-y-2">
        @foreach ($teams as $team)
            <div class="border rounded p-2 text-center">
                <p>Team naam: {{$team->name}}</p>
                <p>Team id: {{$team->id}}</p>
                <a href="#" class="underline text-sm text-gray-600">Klik om team te bekijken</a>
            </div>
        @endforeach
    </div>
    <div class="flex justify-center mt-4">
        <a href="/teams/create" class="text-blue-500 underline">Maak een nieuw team aan</a>
    </div>
</x-base-layout>
