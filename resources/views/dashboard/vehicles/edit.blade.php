<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit vehicle') }}
        </h2>
    </x-slot>

    <x-dashboard-container>
        @livewire('dashboard.vehicles.form-component', [
            'vehicle' => $vehicle,
        ])
    </x-dashboard-container>
</x-app-layout>
