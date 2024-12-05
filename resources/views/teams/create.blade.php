<x-base-layout>
    <div class="flex justify-center flex-row">
        <p class="font-bold">Team aanmaken:</p>
    </div>
    <div class="flex flex-col items-center space-y-2">
        <form action="{{ route('team.create')}}" method="POST">
            @csrf
            <label for="name" class="">Team naam: </label>
            <input type = "text" name="name"/>
            <input type="submit" value="versturen" class="border rounded-md ">
        </form>
    </div>
</x-base-layout>
