<x-base-layout>
    <div class="flex justify-center mb-6 mt-2">
        <p class="font-bold text-2xl mr-2">Toernooi:</p>
        <p class="text-2xl text-gray-700">{{ $tournament->title }}</p>
    </div>

    <form action="{{ route('tournament.update', ['tournament' => $tournament->id]) }}" method="POST" class="flex flex-col gap-4 bg-white p-6 rounded-lg w-full">
        @csrf
        @method('PUT') <!-- PUT-methode voor updaten -->

        <label for="time" class="font-semibold text-gray-700">Startdatum en tijd:</label>
        <input
            type="datetime-local"
            id="time"
            name="time"
            value="{{ $tournament->started ? \Carbon\Carbon::parse($tournament->started)->format('Y-m-d\TH:i') : '' }}"
            class="p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-400"
            required
        >

        <input
            type="submit"
            id="Submit"
            name="Submit"
            value="Opslaan"
            class="mt-4 bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition duration-300 cursor-pointer"
        >
    </form>


    <!-- Formulier om het toernooi te verwijderen -->
    <form action="{{ route('tournament.destroy', $tournament->id) }}" method="POST"
          onsubmit="return confirm('Weet je zeker dat je dit toernooi wilt verwijderen? Dit kan niet worden ongedaan.');" class="w-full">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white font-semibold w-full py-2 rounded-md hover:bg-red-700">
            Verwijder Toernooi
        </button>
        <p class="flex justify-center text-gray-500 dark:text-gray-400 text-sm">Let op, je kan het toernooi niet verwijderen wanneer er al mensen zijn ingeschreven. Deze moeten dan eerst uitgeschreven worden.</p>
    </form>
</x-base-layout>
