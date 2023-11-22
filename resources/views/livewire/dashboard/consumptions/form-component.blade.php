<form wire:submit.prevent="save">
    <x-card class="py-4 px-4">
        <header>
            <h4 class="dark:text-white text-lg font-semibold">
                {{ __('Mileage info') }}
            </h4>
        </header>

        <div class="mt-4 grid gap-4 grid-cols-1">
            <div>
                <x-label for="mileage" value="* {{ __('Mileage') }}" />
                <x-input id="mileage" type="number" class="mt-1 block w-full" wire:model="form.mileage" />
                <x-input-error for="form.mileage" class="mt-2" />
            </div>
        </div>

        <header class="mt-4">
            <h4 class="dark:text-white text-lg font-semibold">
                {{ __('Gas info') }} ({{ __('Optional') }})
            </h4>
        </header>

        <div class="mt-4 grid gap-4 grid-cols-1">
            <div>
                <x-label for="fuel_quantity" value="{{ __('Fuel load') }}" />
                <x-input id="fuel_quantity" type="number" step="0.01" class="mt-1 block w-full" wire:model="form.fuel_quantity" />
                <x-input-error for="form.fuel_quantity" class="mt-2" />
            </div>
        </div>

        <div class="mt-4 grid gap-4 grid-cols-1">
            <div>
                <x-label for="fuel_price" value="{{ __('Fuel load price') }}" />
                <x-input id="fuel_price" type="number" step="0.01" class="mt-1 block w-full" wire:model="form.fuel_price" />
                <x-input-error for="form.fuel_price" class="mt-2" />
            </div>
        </div>

        <div class="mt-4 text-right">
            <x-button>
                {{ __('Save') }}
            </x-button>
        </div>
    </x-card>
</form>
