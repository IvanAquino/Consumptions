<?php

namespace App\Models\QueryBuilders\Concerns;

use App\Models\Team;

trait TeamScopeBuilder
{
    public function whereTeam(Team|int $team)
    {
        if ($team instanceof Team) {
            $team = $team->id;
        }

        return $this->where('team_id', $team);
    }
}
