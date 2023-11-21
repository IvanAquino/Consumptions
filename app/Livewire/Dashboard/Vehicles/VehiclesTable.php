<?php

namespace App\Livewire\Dashboard\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class VehiclesTable extends Component
{
    use WithPagination;

    public function delete($id): void
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle->team_id === auth()->user()->currentTeam->id) {
            $vehicle->delete();
        }
    }

    public function render()
    {
        $vehicles = Vehicle::query()
            ->whereTeam(auth()->user()->currentTeam)
            ->orderBy('model')
            ->paginate(10);

        return view('livewire.dashboard.vehicles.vehicles-table', compact('vehicles'));
    }
}
