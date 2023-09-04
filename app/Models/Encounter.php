<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Encounter extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_team',
        'second_team',
        'first_team_score',
        'second_team_score',
        'arbitrator',
        'start_date',
        'end_date'
    ];

    public function event(): HasMany
    {
        return $this->hasMany(MatchDetail::class, 'encounter_id');
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function firstTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'first_team', 'id');
    }

    public function secondTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'second_team', 'id');
    }
}
