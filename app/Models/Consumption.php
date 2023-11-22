<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'mileage',
        'previous_mileage',
        'fuel_quantity',
        'fuel_price',
        'vehicle_id',
    ];

    protected $casts = [
        'mileage' => 'integer',
        'previous_mileage' => 'integer',
        'fuel_quantity' => 'float',
        'fuel_price' => 'float',
    ];

    protected function traveledDistance(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->mileage - $this->previous_mileage,
        );
    }

    protected function fuelUnitPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->fuel_price / $this->fuel_quantity,
        );
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
