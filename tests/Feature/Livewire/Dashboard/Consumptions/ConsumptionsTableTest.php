<?php

use App\Livewire\Dashboard\Consumptions\ConsumptionsTable;
use App\Models\Consumption;
use App\Models\User;
use App\Models\Vehicle;
use Livewire\Livewire;

it('shows relevant info', function () {
    $this->actingAs($user = User::factory()->withPersonalTeam()->create());
    $vehicle = Vehicle::factory()->create();
    $consumption = Consumption::factory()->create([
        'mileage' => 1000,
        'previous_mileage' => 0,
        'fuel_quantity' => 50,
        'fuel_price' => 100,
        'vehicle_id' => $vehicle->id,
    ]);

    Livewire::test(ConsumptionsTable::class, [
        'vehicle' => $vehicle,
    ])
        ->assertSee(__('Mileage'))
        ->assertSee($consumption->mileage);
});
