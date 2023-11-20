<?php

namespace App\Models\QueryBuilders;

use App\Models\QueryBuilders\Concerns\TeamScopeBuilder;
use Illuminate\Database\Eloquent\Builder;

class VehicleQueryBuilder extends Builder
{
    use TeamScopeBuilder;
}
