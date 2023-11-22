<div>
    <section>
        @foreach($vehicles as $vehicle)
            <article class="mb-4">
                <x-card class="px-4 py-4">
                    <div class="grid gap-4 grid-cols-2 md:grid-cols-3">
                        <div>
                            <a href="{{ route('vehicles.consumptions.index', $vehicle) }}">
                                <x-label value="{{ __('Model') }}" />
                                <p class="font-semibold dark:text-white underline">
                                    {{ $vehicle->model }}
                                </p>
                            </a>
                        </div>
                        <div>
                            <x-label value="{{ __('Year') }}" />
                            <p class="font-semibold dark:text-white">
                                {{ $vehicle->year }}
                            </p>
                        </div>
                        <div>
                            <x-label value="{{ __('Brand') }}" />
                            <p class="font-semibold dark:text-white">
                                {{ $vehicle->brand }}
                            </p>
                        </div>

                        <div>
                            <x-label value="{{ __('Current mileage') }}" />
                            <p class="font-semibold dark:text-white">
                                {{ $vehicle->current_mileage }}
                            </p>
                        </div>
                        <div></div>
                        <div></div>

                        <div class="text-right col-span-2 md:col-span-3">
                            <a href="{{ route('vehicles.consumptions.index', $vehicle) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                {{ __('Consumptions') }}
                            </a>
                            <a href="{{ route('vehicles.edit', $vehicle) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline ml-2">
                                {{ __('Edit') }}
                            </a>
                            <button
                                wire:click="delete({{ $vehicle->id }})"
                                wire:confirm="Are you sure you want to delete this vehicle?"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline ml-2"
                            >
                                {{ __('Delete') }}
                            </button>
                        </div>
                    </div>
                </x-card>
            </article>
        @endforeach
    </section>

    <div class="mt-4">
        {!! $vehicles->links() !!}
    </div>
</div>
