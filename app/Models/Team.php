<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'picture',
        'coach',
        'slogan',
        'followers',
    ];

    public function enconter(): HasMany
    {
        return $this->hasMany(Encounter::class);
    }
}
