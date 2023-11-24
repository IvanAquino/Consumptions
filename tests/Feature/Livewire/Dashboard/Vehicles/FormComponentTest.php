<?php

use App\Livewire\Dashboard\Vehicles\FormComponent;
use App\Models\User;
use App\Models\Vehicle;
use Livewire\Livewire;

it('shows the elements model, brand, year, color, plate, initial_mileage', function () {
    $this->actingAs($user = User::factory()->withPersonalTeam()->create());

    Livewire::test(FormComponent::class)
        ->assertSee(__('Model'))
        ->assertSee(__('Brand'))
        ->assertSee(__('Year'))
        ->assertSee(__('Color'))
        ->assertSee(__('Plate'))
        ->assertSee(__('Initial mileage'));
});

it('shows model validation error', function () {
    $this->actingAs($user = User::factory()->withPersonalTeam()->create());

    Livewire::test(FormComponent::class)
        ->call('save')
        ->assertHasErrors([
            'model' => 'required',
            'initial_mileage' => 'required',
        ]);
});

it('creates new vehicle and assigns initial_mileage to current_mileage', function () {
    $this->actingAs($user = User::factory()->withPersonalTeam()->create());

    Livewire::test(FormComponent::class)
        ->set('form.model', 'Fiesta')
        ->set('form.brand', 'Ford')
        ->set('form.year', '2020')
        ->set('form.color', 'Red')
        ->set('form.plate', 'ABC-123')
        ->set('form.initial_mileage', '1000')
        ->set('form.team_id', $user->currentTeam->id)
        ->assertSet('form.model', 'Fiesta')
        ->assertSet('form.brand', 'Ford')
        ->assertSet('form.year', '2020')
        ->assertSet('form.color', 'Red')
        ->assertSet('form.plate', 'ABC-123')
        ->assertSet('form.initial_mileage', 1000)
        ->assertSet('form.team_id', $user->currentTeam->id)
        ->call('save');

    $this->assertDatabaseHas('vehicles', [
        'model' => 'Fiesta',
        'brand' => 'Ford',
        'year' => '2020',
        'color' => 'Red',
        'plate' => 'ABC-123',
        'initial_mileage' => 1000,
        'current_mileage' => 1000,
        'team_id' => $user->currentTeam->id,
    ]);
});

it('Updates vehicle without change current mileage', function () {
    $this->actingAs($user = User::factory()->withPersonalTeam()->create());
    $vehicle = Vehicle::factory()->create([
        'team_id' => $user->currentTeam->id,
        'current_mileage' => 9999,
    ]);

    Livewire::test(FormComponent::class, [
        'vehicle' => $vehicle,
    ])
        ->set('form.model', 'New model')
        ->set('form.brand', 'New brand')
        ->set('form.year', 2020)
        ->set('form.color', 'Red')
        ->set('form.plate', 'ABC-123')
        ->set('form.initial_mileage', 1000)
        ->assertSet('form.model', 'New model')
        ->assertSet('form.brand', 'New brand')
        ->assertSet('form.year', 2020)
        ->assertSet('form.color', 'Red')
        ->assertSet('form.plate', 'ABC-123')
        ->assertSet('form.initial_mileage', 1000)
        ->call('save');

    $this->assertDatabaseHas('vehicles', [
        'id' => $vehicle->id,
        'model' => 'New model',
        'brand' => 'New brand',
        'year' => '2020',
        'color' => 'Red',
        'plate' => 'ABC-123',
        'initial_mileage' => 1000,
        'current_mileage' => 9999,
    ]);
});
