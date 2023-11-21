<?php

use App\Livewire\Dashboard\Vehicles\VehiclesTable;
use App\Models\User;
use App\Models\Vehicle;
use Livewire\Livewire;

it('shows relevant info of each vehicle', function () {
    $this->actingAs($user = User::factory()->withPersonalTeam()->create());

    $vehicle = Vehicle::factory()->create([
        'team_id' => $user->currentTeam->id,
        'model' => 'Model 1',
        'brand' => 'Brand 1',
        'year' => 2020,
        'initial_mileage' => 1000,
        'current_mileage' => 2000,
    ]);

    $vehicle2 = Vehicle::factory()->create([
        'team_id' => $user->currentTeam->id,
        'model' => 'Model 2',
        'brand' => 'Brand 2',
        'year' => 2021,
        'initial_mileage' => 3000,
        'current_mileage' => 4000,
    ]);

    $user2 = User::factory()->withPersonalTeam()->create();
    $vehicle3 = Vehicle::factory()->create([
        'team_id' => $user2->currentTeam->id,
        'model' => 'Model 3',
        'brand' => 'Brand 3',
        'year' => 2022,
        'initial_mileage' => 5000,
        'current_mileage' => 6000,
    ]);

    Livewire::test(VehiclesTable::class)
        ->assertSee($vehicle->model)
        ->assertSee($vehicle->brand)
        ->assertSee($vehicle->year)
        ->assertSee(number_format($vehicle->current_mileage, 0))
        ->assertSee($vehicle2->model)
        ->assertSee($vehicle2->brand)
        ->assertSee($vehicle2->year)
        ->assertSee(number_format($vehicle2->current_mileage, 0))
        ->assertDontSee($vehicle3->model)
        ->assertDontSee($vehicle3->brand)
        ->assertDontSee($vehicle3->year)
        ->assertDontSee(number_format($vehicle3->current_mileage, 0));
});

it("doesn't delete vehicles that don't belong to the current team", function () {
    $this->actingAs($user = User::factory()->withPersonalTeam()->create());
    $vehicle = Vehicle::factory()->create();

    Livewire::test(VehiclesTable::class)
        ->call('delete', $vehicle->id);

    $this->assertDatabaseHas('vehicles', [
        'id' => $vehicle->id,
    ]);
});

it('deletes vehicles that belong to the current team', function () {
    $this->actingAs($user = User::factory()->withPersonalTeam()->create());
    $vehicle = Vehicle::factory()->create([
        'team_id' => $user->currentTeam->id,
    ]);

    Livewire::test(VehiclesTable::class)
        ->call('delete', $vehicle->id);

    $this->assertDatabaseMissing('vehicles', [
        'id' => $vehicle->id,
    ]);
});
