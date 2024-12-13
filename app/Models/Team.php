<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    use HasFactory;

    public function gameTeam1(): HasOne
    {
        return $this->hasOne(Game::class, 'team_1');
    }

    public function gameTeam2(): HasOne
    {
        return $this->hasOne(Game::class, 'team_2');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'team_id');
    }

}
