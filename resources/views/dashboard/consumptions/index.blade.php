<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $vehicle->model }} {{ $vehicle->year }} -
            {{ __('Consumptions') }}
        </h2>
    </x-slot>

    <x-dashboard-container>
        @if ($hasConsumptions)
            <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
                <div>
                </div>
                <div>
                    <div class="text-right">
                        <x-button-link href="{{ route('vehicles.consumptions.create', $vehicle) }}">
                            {{ __('Add consumption') }}
                        </x-button-link>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                @livewire('dashboard.consumptions.consumptions-table', [
                    'vehicle' => $vehicle,
                ])
            </div>
        @else
            <x-card class="py-8 px-2">
                <div class="text-center">
                    <p class="text-lg text-gray-500 dark:text-gray-300">
                        {{ __('You have no consumptions yet.') }}
                    </p>
                    <div class="mt-4">
                        <x-button-link href="{{ route('vehicles.consumptions.create', $vehicle) }}">
                            {{ __('Add first consumption') }}
                        </x-button-link>
                    </div>
                </div>
            </x-card>
        @endif
    </x-dashboard-container>
</x-app-layout>
