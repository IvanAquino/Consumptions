<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Model') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Year') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Brand') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Current mileage') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Actions') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                            <a href="{{ route('vehicles.consumptions.index', $vehicle) }}" class="text-blue-600 dark:text-blue-500">
                                {{ $vehicle->model }}
                            </a>
                        </th>
                        <td class="px-6 py-4">
                            {{ $vehicle->year}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $vehicle->brand }}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($vehicle->current_mileage, 0) }} {{ __('MI') }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('vehicles.edit', $vehicle) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                {{ __('Edit') }}
                            </a>
                            <button
                                wire:click="delete({{ $vehicle->id }})"
                                wire:confirm="Are you sure you want to delete this vehicle?"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline ml-2"
                            >
                                {{ __('Delete') }}
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {!! $vehicles->links() !!}
    </div>
</div>
