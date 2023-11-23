<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vehicles') }}
        </h2>
    </x-slot>

    <x-dashboard-container>
        @if ($hasVehicles)
            <div class="text-right">
                <x-button-link href="{{ route('vehicles.create') }}">
                    {{ __('Add vehicle') }}
                </x-button-link>
            </div>

            <div class="mt-4">
                @livewire('dashboard.vehicles.vehicles-table')
            </div>
        @else
            <x-card class="py-8 px-2">
                <div class="text-center">
                    <p class="text-lg text-gray-500 dark:text-gray-300">
                        {{ __('You have no vehicles yet.') }}
                    </p>
                    <div class="mt-4">
                        <x-button-link href="{{ route('vehicles.create') }}">
                            {{ __('Add first vehicle') }}
                        </x-button-link>
                    </div>
                </div>
            </x-card>
        @endif
    </x-dashboard-container>
</x-app-layout>
