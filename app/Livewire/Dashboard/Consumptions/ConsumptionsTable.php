<?php

namespace App\Livewire\Dashboard\Consumptions;

use App\Models\Vehicle;
use Livewire\Component;

class ConsumptionsTable extends Component
{
    public Vehicle $vehicle;

    public function delete($id)
    {
        $consumption = $this->vehicle
            ->consumptions()
            ->find($id);

        if (! $consumption) {
            return;
        }

        $consumption->delete();
    }

    public function render()
    {
        $consumptions = $this->vehicle
            ->consumptions()
            ->latest()
            ->paginate(20);

        return view('livewire.dashboard.consumptions.consumptions-table', compact('consumptions'));
    }
}
