<div>
    <section>
        @foreach($consumptions as $consumption)
            <article id="{{ $consumption->id }}" class="mb-4">
                <x-card class="px-4 py-2">
                    <div class="grid gap-2 grid-cols-1 md:grid-cols-3">
                        <div>
                            <x-label value="{{ __('Mileage') }}"/>
                            <p class="font-semibold dark:text-white">
                                {{ $consumption->mileage }}
                            </p>
                        </div>
                        <div>
                            <x-label value="{{ __('Previous mileage') }}"/>
                            <p class="font-semibold dark:text-white">
                                {{ $consumption->previous_mileage }}
                            </p>
                        </div>
                        <div>
                            <x-label value="{{ __('Traveled distance') }}"/>
                            <p class="font-semibold dark:text-white">
                                {{ $consumption->traveledDistance }}
                            </p>
                        </div>

                        @if($consumption->fuel_quantity || $consumption->fuel_price)
                            <div>
                                <x-label value="{{ __('Fuel quantity') }}"/>
                                <p class="font-semibold dark:text-white">
                                    {{ number_format($consumption->fuel_quantity ?: 0, 2) }}
                                </p>
                            </div>
                            <div>
                                <x-label value="{{ __('Fuel price') }}"/>
                                <p class="font-semibold dark:text-white">
                                    $ {{ number_format($consumption->fuel_price ?: 0, 2) }}
                                </p>
                            </div>
                            <div>
                                <x-label value="{{ __('Fuel unit price') }}"/>
                                <p class="font-semibold dark:text-white">
                                    {{ number_format($consumption->fuelUnitPrice ?: 0, 2) }}
                                </p>
                            </div>
                        @endif

                        <div></div>
                        <div></div>
                        <div class="text-right">
                            <a href="{{ route('vehicles.consumptions.edit', [$vehicle, $consumption]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                {{ __('Edit') }}
                            </a>
                            <button
                                wire:click="delete({{ $consumption->id }})"
                                wire:confirm="Are you sure you want to delete this consumption?"
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

    <section class="mt-4">
        {!! $consumptions->links() !!}
    </section>
</div>
