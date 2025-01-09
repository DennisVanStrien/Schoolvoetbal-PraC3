<x-base-layout>
    <!-- Titel: Team aanmaken -->
    <div class="flex justify-center mb-6">
        <p class="font-bold text-xl text-gray-800 dark:text-gray-200">Team aanmaken:</p>
    </div>

    <!-- Formulier voor team aanmaken -->
    <div class="flex justify-center">
        <form action="{{ route('team.create') }}" method="POST"
              class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-4">
            @csrf
            <!-- Label en invoerveld -->
            <div class="flex flex-col space-y-2">
                <label for="name" class="font-semibold text-gray-800 dark:text-gray-200">Team naam:</label>
                <input type="text" name="name" id="name"
                       class="border rounded-md p-2 text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 focus:ring focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Verzenden-knop -->
            <div class="flex justify-center">
                <input type="submit" value="Aanmaken"
                       class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:ring focus:ring-blue-300 cursor-pointer">
            </div>
        </form>
    </div>

    <!-- Let op sectie -->
    <div class="flex items-center justify-center mt-8">
        <i class="fa-solid fa-triangle-exclamation text-yellow-500 text-xl mr-2"></i>
        <h2 class="font-bold text-lg text-gray-800 dark:text-gray-200">LET OP</h2>
        <i class="fa-solid fa-triangle-exclamation text-yellow-500 text-xl ml-2"></i>
    </div>
    <p class="text-center text-gray-600 dark:text-gray-400 mt-2">
        Je kan maar maximaal 1 team hebben. Wanneer je een 2e aanmaakt, wordt dit je nieuwe team en verlies je eigenaarschap van je oude team.
    </p>
</x-base-layout>
