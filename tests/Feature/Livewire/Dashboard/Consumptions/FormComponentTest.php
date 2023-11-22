<?php

use App\Livewire\Dashboard\Consumptions\FormComponent;
use App\Models\Consumption;
use App\Models\User;
use App\Models\Vehicle;
use Livewire\Livewire;

it('shows validation errors', function () {
    $this->actingAs($user = User::factory()->withPersonalTeam()->create());
    $vehicle = Vehicle::factory()->create([
        'team_id' => $user->currentTeam->id,
    ]);

    Livewire::test(FormComponent::class, [
        'vehicle' => $vehicle,
    ])
        ->call('save')
        ->assertHasErrors([
            'mileage' => 'required',
        ]);
});

it('creates a new consumption and assigns mileage to vehicle without previous consumption', function () {
    $this->actingAs($user = User::factory()->withPersonalTeam()->create());
    $vehicle = Vehicle::factory()->create([
        'team_id' => $user->currentTeam->id,
        'initial_mileage' => 0,
        'current_mileage' => 0,
    ]);

    Livewire::test(FormComponent::class, [
        'vehicle' => $vehicle,
    ])
        ->set('form.mileage', 100)
        ->set('form.fuel_quantity', 10)
        ->set('form.fuel_price', 1.5)
        ->assertSet('form.mileage', 100)
        ->assertSet('form.fuel_quantity', 10)
        ->assertSet('form.fuel_price', 1.5)
        ->call('save');

    $this->assertDatabaseHas('consumptions', [
        'mileage' => 100,
        'fuel_quantity' => 10,
        'fuel_price' => 1.5,
        'vehicle_id' => $vehicle->id,
    ]);

    $this->assertDatabaseHas('vehicles', [
        'id' => $vehicle->id,
        'current_mileage' => 100,
    ]);
});

it('creates a new consumption and assigns mileage to vehicle when a previous consumption exists', function () {
    $this->actingAs($user = User::factory()->withPersonalTeam()->create());
    $vehicle = Vehicle::factory()->create([
        'team_id' => $user->currentTeam->id,
        'initial_mileage' => 0,
        'current_mileage' => 0,
    ]);

    $consumption = Consumption::factory()->create([
        'vehicle_id' => $vehicle->id,
        'mileage' => 0,
        'previous_mileage' => 0,
        'fuel_quantity' => 0,
        'fuel_price' => 0,
    ]);

    Livewire::test(FormComponent::class, [
        'vehicle' => $vehicle,
    ])
        ->set('form.mileage', 100)
        ->set('form.fuel_quantity', 10)
        ->set('form.fuel_price', 1.5)
        ->assertSet('form.mileage', 100)
        ->assertSet('form.fuel_quantity', 10)
        ->assertSet('form.fuel_price', 1.5)
        ->call('save');

    $this->assertDatabaseHas('consumptions', [
        'mileage' => 100,
        'fuel_quantity' => 10,
        'fuel_price' => 1.5,
        'vehicle_id' => $vehicle->id,
    ]);

    $this->assertDatabaseHas('vehicles', [
        'id' => $vehicle->id,
        'current_mileage' => 100,
    ]);
});

it('updates consumptions and vehicle current mileage', function () {
    $this->actingAs($user = User::factory()->withPersonalTeam()->create());
    $vehicle = Vehicle::factory()->create([
        'team_id' => $user->currentTeam->id,
        'initial_mileage' => 0,
        'current_mileage' => 10,
    ]);

    $consumption = Consumption::factory()->create([
        'vehicle_id' => $vehicle->id,
        'mileage' => 10,
        'previous_mileage' => 5,
        'fuel_quantity' => 0,
        'fuel_price' => 0,
    ]);

    Livewire::test(FormComponent::class, [
        'vehicle' => $vehicle,
        'consumption' => $consumption,
    ])
        ->set('form.mileage', 20)
        ->set('form.fuel_quantity', 10)
        ->set('form.fuel_price', 15)
        ->assertSet('form.mileage', 20)
        ->assertSet('form.previous_mileage', 5)
        ->assertSet('form.fuel_quantity', 10)
        ->assertSet('form.fuel_price', 15)
        ->call('save');

    $this->assertDatabaseHas('consumptions', [
        'id' => $consumption->id,
        'mileage' => 20,
        'fuel_quantity' => 10,
        'fuel_price' => 15,
        'vehicle_id' => $vehicle->id,
    ]);
    $this->assertDatabaseHas('vehicles', [
        'id' => $vehicle->id,
        'current_mileage' => 20,
    ]);

    // Updates when a previous consumption exists
    $vehicle->update([
        'current_mileage' => 50,
    ]);
    Consumption::factory()->create([
        'vehicle_id' => $vehicle->id,
        'mileage' => 50,
        'previous_mileage' => 20,
        'fuel_quantity' => 0,
        'fuel_price' => 0,
    ]);

    Livewire::test(FormComponent::class, [
        'vehicle' => $vehicle,
        'consumption' => $consumption,
    ])
        ->set('form.mileage', 21)
        ->set('form.fuel_quantity', 10)
        ->set('form.fuel_price', 15)
        ->assertSet('form.mileage', 21)
        ->assertSet('form.previous_mileage', 5)
        ->assertSet('form.fuel_quantity', 10)
        ->assertSet('form.fuel_price', 15)
        ->call('save');

    $this->assertDatabaseHas('consumptions', [
        'id' => $consumption->id,
        'mileage' => 21,
        'fuel_quantity' => 10,
        'fuel_price' => 15,
        'vehicle_id' => $vehicle->id,
    ]);
    $this->assertDatabaseHas('vehicles', [
        'id' => $vehicle->id,
        'current_mileage' => 50,
    ]);
});
