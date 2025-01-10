<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Game extends Model
{
    use HasFactory;

    public function team1(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_1');
    }

    public function team2(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_2');
    }

    public function tournament(): BelongsTo
    {
        return $this->belongsto(Tournament::class, 'tournament');
    }
}
