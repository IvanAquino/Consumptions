<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $vehicle->model }}
            {{ $vehicle->year }}
            -
            {{ __('Add consumption') }}
        </h2>
    </x-slot>

    <x-dashboard-container>
        @livewire('dashboard.consumptions.form-component', [
            'vehicle' => $vehicle,
        ])
    </x-dashboard-container>
</x-app-layout>
