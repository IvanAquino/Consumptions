<?php

use App\Http\Controllers\Dashboard\ConsumptionsController;
use App\Http\Controllers\Dashboard\VehiclesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('dashboard/vehicles')->as('vehicles.')->group(function () {
        Route::get('/create', [VehiclesController::class, 'create'])->name('create');
        Route::get('/{vehicle}/edit', [VehiclesController::class, 'edit'])->name('edit');

        Route::prefix('{vehicle}/consumptions')->as('consumptions.')->group(function () {
            Route::get('/', [ConsumptionsController::class, 'index'])->name('index');
            Route::get('/create', [ConsumptionsController::class, 'create'])->name('create');
            Route::get('/{consumption}/edit', [ConsumptionsController::class, 'edit'])->name('edit');
        });
    });
});
