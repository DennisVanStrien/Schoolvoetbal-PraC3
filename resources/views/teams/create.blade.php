<x-base-layout>
    <div class="flex justify-center flex-row">
        <p class="font-bold">Team aanmaken:</p>
    </div>
    <div class="flex flex-col items-center space-y-2">
        <form action="{{ route('team.create')}}" method="POST">
            @csrf
            <label for="name" class="">Team naam: </label>
            <input type = "text" name="name"/>
            <input type="submit" value="Aanmaken" class="border rounded-md ">
        </form>
    </div>
    <div class="flex items-center">
    <i class="fa-solid fa-triangle-exclamation mr-1"></i>
    <h2 class="font-bold">LET OP</h2>
    <i class="fa-solid fa-triangle-exclamation ml-1"></i>
    </div>
    <p>Je kan maar maximaal 1 team hebben, wanneer je een 2e aanmaakt wordt dit je nieuwe team en verlies je eigenaarschap van je oude team </p>
</x-base-layout>
