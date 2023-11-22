<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Consumptions') }}
        </h2>
    </x-slot>

    <x-dashboard-container>
        <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
            <div>
                <h2 class="font-semibold text-lg dark:text-white">
                    {{ $vehicle->model }} {{ $vehicle->year }}
                </h2>
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
    </x-dashboard-container>
</x-app-layout>
