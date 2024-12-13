<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(auth()->user()->role === 'user' || auth()->user()->role === 'referee')
                <div class="bg-blue-500 text-white p-6 mt-4 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold">Welkom Gebruiker!</h3>
                    <p>Nog niks</p>
                </div>
            @elseif(auth()->user()->role === 'admin')
                <div class="bg-green-500 text-white p-6 mt-4 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold">Welkom Admin!</h3>
                    <p>Hieronder vind je een Admin-Panel om teams te beheren van alle personen te beheren</p>
                </div>
            @else
                <div class="bg-red-500 text-white p-6 mt-4 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold">Geen Toegang</h3>
                    <p>Dat is raar, uw rol kan niet gevonden worden door ons systeem. Dit is misschien een fout of je hoort helemaal niet op deze pagina te zijn.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
