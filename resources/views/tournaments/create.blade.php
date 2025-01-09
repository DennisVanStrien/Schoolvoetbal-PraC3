<x-base-layout>
    @auth
    <div class="flex justify-center flex-row">
        <p class="font-bold">Toernooi aanmaken:</p>
    </div>
    <div class="flex flex-col items-center space-y-2">
        @if(auth()->user()->role === 'admin')
            <form action="{{ route('tournament.create')}}" method="POST">
                @csrf
                <label for="title" class="">Toernooi naam: </label>
                <input type = "text" name="title"/>
                <label for="maxTeams" class="">Maximaal aantal teams:</label>
                <input type = "number" name="maxTeams"/>
                <input type="submit" value="Aanmaken" class="border rounded-md ">
            </form>
        @else
            <p>Je moet een admin zijn om een toernooi aan te kunnen maken</p>
        @endif
    </div>
    @endauth
    @guest
        <div class="flex justify-center flex-row">
            <p class="font-bold">Log in om dit te bekijken</p>
        </div>
    @endguest
</x-base-layout>
