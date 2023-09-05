<?php

namespace App\Console\Commands;

use App\Models\Encounter;
use App\Models\MatchDetail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StartMatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start-match';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command allowed to create a new event when match start';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $matchs = Encounter::where('start_date', date('Y-m-d H:i'))->get();

        Log::debug($matchs);

        foreach ($matchs as $match) {

            $newMatchEvent = new MatchDetail();

            DB::transaction(
                callback: fn (): bool => $newMatchEvent->forceFill([
                    'encounter_id' => $match->id,
                    'title' => 'Démarrage du match',
                    'event' => 'Début du match entre l\' équipe ' . $match->firstTeam->name . ' et ' . $match->secondTeam->name,
                ])->save()
            );
        }
    }
}
