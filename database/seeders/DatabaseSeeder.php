<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Encounter;
use App\Models\MatchDetail;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Team::factory(4)->create();

        Encounter::factory(9)->create();

        MatchDetail::factory(10)->create();

        Player::factory(44)->create();
    }
}
