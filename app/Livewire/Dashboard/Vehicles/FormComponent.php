<?php

namespace App\Livewire\Dashboard\Vehicles;

use App\Livewire\Forms\VehicleForm;
use App\Models\Vehicle;
use Livewire\Component;

class FormComponent extends Component
{
    public ?Vehicle $vehicle = null;

    public VehicleForm $form;

    public function mount()
    {
        $user = auth()->user();
        $this->form->team_id = $user->currentTeam->id;

        if ($this->vehicle) {
            $this->form->fill([
                'id' => $this->vehicle->id,
                'model' => $this->vehicle->model,
                'brand' => $this->vehicle->brand,
                'year' => $this->vehicle->year,
                'color' => $this->vehicle->color,
                'plate' => $this->vehicle->plate,
                'initial_mileage' => $this->vehicle->initial_mileage,
                'current_mileage' => $this->vehicle->current_mileage,
                'team_id' => $this->vehicle->team_id,
            ]);
        }
    }

    public function save()
    {
        $this->validate();
        $this->form->store();

        session()->flash('flash.banner', 'Yay it works!');
        session()->flash('flash.bannerStyle', 'success');

        return to_route('dashboard');
    }

    public function render()
    {
        return view('livewire.dashboard.vehicles.form-component');
    }
}
