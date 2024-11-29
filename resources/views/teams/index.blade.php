<x-base-layout>
    <div class="flex justify-center">
        <h1 class="font-bold text-lg">Alle teams:</h1>
            @foreach ($teams as $team)
                {{$team->name}}
            @endforeach
            <p class="bold"> help </p>
        <a href="#">Maak een nieuw team aan</a>
    </div>
</x-base-layout>
