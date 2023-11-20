<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vehicles') }}
        </h2>
    </x-slot>

    <x-dashboard-container>
        <div class="text-right">
            <x-button-link href="{{ route('vehicles.create') }}">
                {{ __('Add vehicle') }}
            </x-button-link>
        </div>

        <div class="mt-4">
            @livewire('dashboard.vehicles.vehicles-table')
        </div>
    </x-dashboard-container>
</x-app-layout>
