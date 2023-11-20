<?php

namespace App\Models;

use App\Models\Concerns\BelongsToTeam;
use App\Models\QueryBuilders\VehicleQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use BelongsToTeam;
    use HasFactory;

    protected $fillable = [
        'model',
        'brand',
        'year',
        'color',
        'plate',
        'initial_mileage',
        'current_mileage',
        'team_id',
    ];

    protected $casts = [
        'year' => 'integer',
        'initial_mileage' => 'integer',
        'current_mileage' => 'integer',
    ];

    public function newEloquentBuilder($query)
    {
        return new VehicleQueryBuilder($query);
    }
}
