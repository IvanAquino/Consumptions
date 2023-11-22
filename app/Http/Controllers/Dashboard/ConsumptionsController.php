<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Consumption;
use App\Models\Vehicle;

class ConsumptionsController extends Controller
{
    public function index(Vehicle $vehicle)
    {
        return view('dashboard.consumptions.index', compact('vehicle'));
    }

    public function show(Consumption $consumption)
    {
        return view('dashboard.consumptions.show', compact('consumption'));
    }

    public function create(Vehicle $vehicle)
    {
        return view('dashboard.consumptions.create', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle, Consumption $consumption)
    {
        return view('dashboard.consumptions.edit', compact('vehicle', 'consumption'));
    }
}
