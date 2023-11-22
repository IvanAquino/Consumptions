<?php

namespace App\Livewire\Dashboard\Consumptions;

use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ConsumptionsTable extends Component
{
    public Vehicle $vehicle;

    public function delete($id)
    {
        $vehicle = $this->vehicle;
        $consumption = $this->vehicle
            ->consumptions()
            ->find($id);

        if (! $consumption) {
            return;
        }

        DB::transaction(function () use ($consumption) {
            $theresMoreConsumptions = $this->vehicle->consumptions()->count() > 1;
            $latestConsumption = $this->vehicle->consumptions()->latest()->first();

            if (! $theresMoreConsumptions) {
                $this->vehicle->update([
                    'current_mileage' => $this->vehicle->initial_mileage,
                ]);
            } elseif ($latestConsumption->id === $consumption->id) {
                $this->vehicle->update([
                    'current_mileage' => $consumption->previous_mileage,
                ]);
            }

            $consumption->delete();
        });
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
