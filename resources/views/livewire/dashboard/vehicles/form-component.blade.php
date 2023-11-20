<form wire:submit.prevent="save">
    <x-card class="py-4 px-4">
        <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
            <div>
                <x-label for="model" value="* {{ __('Model') }}" />
                <x-input id="model" type="text" class="mt-1 block w-full" wire:model="form.model" />
                <x-input-error for="form.model" class="mt-2" />
            </div>

            <div>
                <x-label for="initial_mileage" value="* {{ __('Initial mileage') }}" />
                <x-input id="initial_mileage" type="number" class="mt-1 block w-full" wire:model="form.initial_mileage" />
                <x-input-error for="form.initial_mileage" class="mt-2" />
            </div>

            <div>
                <x-label for="brand" value="{{ __('Brand') }}" />
                <x-input id="brand" type="text" class="mt-1 block w-full" wire:model="form.brand" />
                <x-input-error for="form.brand" class="mt-2" />
            </div>

            <div>
                <x-label for="year" value="{{ __('Year') }}" />
                <x-input id="year" type="number" class="mt-1 block w-full" wire:model="form.year" />
                <x-input-error for="form.year" class="mt-2" />
            </div>

            <div>
                <x-label for="color" value="{{ __('Color') }}" />
                <x-input id="color" type="text" class="mt-1 block w-full" wire:model="form.color" />
                <x-input-error for="form.color" class="mt-2" />
            </div>

            <div>
                <x-label for="plate" value="{{ __('Plate') }}" />
                <x-input id="plate" type="text" class="mt-1 block w-full" wire:model="form.plate" />
                <x-input-error for="form.plate" class="mt-2" />
            </div>
        </div>

        <div class="mt-4 text-right">
            <x-button>
                {{ __('Save') }}
            </x-button>
        </div>
    </x-card>
</form>
