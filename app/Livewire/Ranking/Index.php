<?php

namespace App\Livewire\Ranking;

use App\Models\Encounter;
use App\Models\Team;
use Livewire\Component;

class Index extends Component
{
    public array $ranking;

    public $i = 0;

    protected $listeners = ['echo:request-treatment,RequestTreatment' => 'refreshPage'];

    public function refreshPage()
    {
        $this->mount();
    }

    public function mount()
    {
        $teamIds = Team::all()->pluck('id');

        $globalArray = [];

        foreach ($teamIds as $key => $value) {
            $drawStat = Encounter::where(function ($query) use ($value) {
                $query->where('first_team', $value)
                    ->orWhere('second_team', $value);
            })->whereColumn('first_team_score', '=', 'second_team_score')
                ->where('start_date', '<', date('Y-m-d H:i:s'))
                ->count();

            $victoryStat = ((3 * Encounter::where('first_team', $value)->whereColumn('first_team_score', '>', 'second_team_score')->where('start_date', '<', date('Y-m-d H:i:s'))->count()) + (3 * Encounter::where('second_team', $value)->whereColumn('first_team_score', '<', 'second_team_score')->where('start_date', '<', date('Y-m-d H:i:s'))->count()));

            $total = $drawStat + $victoryStat;

            $totalMatch = Encounter::where(function ($query) use ($value) {
                $query->where('first_team', $value)
                    ->orWhere('second_team', $value);
            })->where('start_date', '<', date('Y-m-d H:i:s'))
                ->count();

            $firstArray = [
                'team_name' => Team::where('id', $value)->first()->name,
                'team_id' => Team::where('id', $value)->first()->id,
                'total' => $total,
                'totalMatch' => $totalMatch,
                'draws' => $drawStat,
                'victories' => Encounter::where('first_team', $value)->whereColumn('first_team_score', '>', 'second_team_score')->where('start_date', '<', date('Y-m-d H:i:s'))->count() + Encounter::where('second_team', $value)->whereColumn('first_team_score', '<', 'second_team_score')->where('start_date', '<', date('Y-m-d H:i:s'))->count(),
                'defeats' => Encounter::where('first_team', $value)->whereColumn('first_team_score', '<', 'second_team_score')->where('start_date', '<', date('Y-m-d H:i:s'))->count() + Encounter::where('second_team', $value)->whereColumn('first_team_score', '>', 'second_team_score')->where('start_date', '<', date('Y-m-d H:i:s'))->count()
            ];

            array_push($globalArray, $firstArray);
        }
        usort($globalArray, function ($a, $b) {
            return $b['total'] - $a['total'];
        });

        $this->ranking = $globalArray;
    }

    public function render()
    {
        return view('livewire.ranking.index');
    }
}
