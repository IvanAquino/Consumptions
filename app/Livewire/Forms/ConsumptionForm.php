<?php

namespace App\Livewire\Forms;

use App\Models\Consumption;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ConsumptionForm extends Form
{
    public $id;

    #[Rule('required')]
    public $mileage;

    public $previous_mileage;

    public $fuel_quantity;

    public $fuel_price;

    public $vehicle_id;

    public function store(): Consumption
    {
        return Consumption::updateOrCreate(
            ['id' => $this->id],
            $this->only(
                'mileage',
                'previous_mileage',
                'fuel_quantity',
                'fuel_price',
                'vehicle_id',
            )
        );
    }
}
