<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;

class VehiclesController extends Controller
{
    public function index()
    {
        $hasVehicles = Vehicle::query()
            ->whereTeam(auth()->user()->currentTeam)
            ->exists();

        return view('dashboard', compact('hasVehicles'));
    }

    public function create()
    {

        return view('dashboard.vehicles.create');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('dashboard.vehicles.edit', compact('vehicle'));
    }
}
