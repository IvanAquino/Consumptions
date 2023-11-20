<?php

namespace App\Livewire\Forms;

use App\Models\Vehicle;
use Livewire\Attributes\Rule;
use Livewire\Form;

class VehicleForm extends Form
{
    public $id;

    public $team_id;

    #[Rule('required')]
    public $model = '';

    public $brand = '';

    public $year = '';

    public $color = '';

    public $plate = '';

    #[Rule('required')]
    public $initial_mileage = null;

    public $current_mileage = null;

    public function store()
    {
        $data = $this->only(
            'model',
            'brand',
            'year',
            'color',
            'plate',
            'initial_mileage',
            'current_mileage',
            'team_id'
        );

        if (! $this->id) {
            $data['current_mileage'] = $data['initial_mileage'];
        }

        return Vehicle::updateOrCreate(
            ['id' => $this->id],
            $data
        );
    }
}
