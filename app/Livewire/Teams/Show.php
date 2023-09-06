<?php

namespace App\Livewire\Teams;

use App\Events\RequestTreatment;
use App\Models\Encounter;
use App\Models\Follower;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    public $details;

    public $nextMatchs;

    public int $team;

    public $data;

    public array $ranking;

    public $i = 0;

    protected $listeners = ['echo:request-treatment,RequestTreatment' => 'refreshPage'];

    public function refreshPage()
    {
        $this->mount();
    }

    public function mount()
    {

        $this->data = Team::with(['players' => function ($query) {
            $query->orderBy('post');
        }])->withCount('follower')
            ->where('id', $this->team)
            ->first();

        $this->details = Encounter::where(function ($query) {
            $query->where('first_team', $this->team)
                ->orWhere('second_team', $this->team);
        })
            ->where('start_date', '<', date('Y-m-d H:i:s'))
            ->whereNotNull('end_date')
            ->get();

        $this->nextMatchs = Encounter::where(function ($query) {
            $query->where('first_team', $this->team)
                ->orWhere('second_team', $this->team);
        })
            ->where('start_date', '>=', date('Y-m-d H:i:s'))
            ->orderBy('start_date')
            ->get();

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

    public function follower(string $team)
    {
        if (Auth::user()) {
            $follower = new Follower();
            DB::transaction(
                callback: fn (): bool => $follower->forceFill(
                    attributes: [
                        'team_id' => $team,
                        'user_id' => Auth::user()->id,
                    ]
                )->save(),
            );
            event(new RequestTreatment);
        } else {
            return redirect()->route('login:login')->with('Veuillez vous connecter pour vous abonner');
        }
    }

    public function unFollow(string $team)
    {
        Follower::where('user_id', Auth::user()->id)->where('team_id', $team)->first()->delete();
        event(new RequestTreatment);
    }

    public function render()
    {
        return view('livewire.teams.show');
    }
}
