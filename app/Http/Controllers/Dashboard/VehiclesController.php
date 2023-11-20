<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;

class VehiclesController extends Controller
{
    public function create()
    {
        return view('dashboard.vehicles.create');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('dashboard.vehicles.edit', compact('vehicle'));
    }
}
