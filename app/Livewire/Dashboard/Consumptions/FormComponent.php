<?php

namespace App\Livewire\Dashboard\Consumptions;

use App\Livewire\Forms\ConsumptionForm;
use App\Models\Consumption;
use App\Models\Vehicle;
use Livewire\Component;

class FormComponent extends Component
{
    public Vehicle $vehicle;

    public ?Consumption $consumption = null;

    public ConsumptionForm $form;

    public function mount()
    {
        $this->form->vehicle_id = $this->vehicle->id;
        $this->form->previous_mileage = $this->vehicle->current_mileage ?: 0;

        if ($this->consumption) {
            $this->form->fill([
                'id' => $this->consumption->id,
                'mileage' => $this->consumption->mileage,
                'previous_mileage' => $this->consumption->previous_mileage,
                'fuel_quantity' => $this->consumption->fuel_quantity,
                'fuel_price' => $this->consumption->fuel_price,
                'vehicle_id' => $this->consumption->vehicle_id,
            ]);
        }
    }

    public function save()
    {
        $this->validate();

        $consumption = $this->form->store();
        $lastConsumption = $this->vehicle
            ->consumptions()
            ->where('id', '!=', $consumption->id)
            ->latest()
            ->first();

        if (! $lastConsumption || ($lastConsumption->mileage < $consumption->mileage)) {
            $this->vehicle->update([
                'current_mileage' => $consumption->mileage,
            ]);
        }

        session()->flash('flash.banner', __('Consumption saved successfully'));
        session()->flash('flash.bannerStyle', 'success');

        return to_route('vehicles.consumptions.index', $this->vehicle);
    }

    public function render()
    {
        return view('livewire.dashboard.consumptions.form-component');
    }
}
