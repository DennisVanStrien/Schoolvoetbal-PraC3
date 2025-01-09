<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @guest
        <p class="flex justify-center">Je moet ingelogd zijn om je in te schrijven</p>
    @endguest

    <div class="flex flex-col items-center space-y-2">
        Dit is het schema
    </div>

</x-app-layout>
