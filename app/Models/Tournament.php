<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tournament extends Model
{
    use HasFactory;

    public function games()
    {
        return $this->hasMany(Game::class);
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'tournament_teams', 'tournament_id', 'team_id');
    }
}
