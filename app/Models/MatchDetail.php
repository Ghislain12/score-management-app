<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatchDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'encounter_id',
        'event',
        'title'
    ];

    public function enconter(): BelongsTo
    {
        return $this->belongsTo(Encounter::class);
    }
}
