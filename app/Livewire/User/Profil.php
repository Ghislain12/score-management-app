<?php

namespace App\Livewire\User;

use App\Models\Bet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profil extends Component
{
    public $totalPoint, $matchWins, $matchLoose, $awaiting;

    protected $listeners = ['echo:request-treatment,RequestTreatment' => 'refreshPage'];

    public function refreshPage()
    {
        $this->mount();
    }

    public function mount()
    {
        $win = Bet::join('encounters', 'bets.encounter_id', 'encounters.id')
            ->where('user_id', Auth::user()->id)
            ->where(function (Builder $query) {
                $query->where('bet', 'V1')
                    ->whereColumn('encounters.first_team_score', '>', 'encounters.second_team_score')
                    ->whereNotNull('encounters.end_date');
            })->orWhere(function (Builder $query) {
                $query->where('bet', 'X')
                    ->whereColumn('encounters.first_team_score', '=', 'encounters.second_team_score')
                    ->whereNotNull('encounters.end_date');
            })->orWhere(function (Builder $query) {
                $query->where('bet', 'V2')
                    ->whereColumn('encounters.first_team_score', '>', 'encounters.second_team_score')
                    ->whereNotNull('encounters.end_date');
            });

        $lost = Bet::join('encounters', 'bets.encounter_id', 'encounters.id')
            ->where('user_id', Auth::user()->id)
            ->where(function (Builder $query) {
                $query->where('bet', 'V1')
                    ->whereColumn('encounters.first_team_score', '<=', 'encounters.second_team_score')
                    ->whereNotNull('encounters.end_date');
            })
            ->orWhere(function (Builder $query) {
                $query->where('bet', 'X')
                    ->whereColumn('encounters.first_team_score', '!=', 'encounters.second_team_score')
                    ->whereNotNull('encounters.end_date');
            })->orWhere(function (Builder $query) {
                $query->where('bet', 'V2')
                    ->whereColumn('encounters.first_team_score', '>=', 'encounters.second_team_score')
                    ->whereNotNull('encounters.end_date');
            });

        $awaiting = Bet::join('encounters', 'bets.encounter_id', 'encounters.id')->whereNull('encounters.end_date')->get();

        $this->totalPoint = (10 * $win->count()) - (5 * $lost->count());

        $this->matchWins = $win->get();
        $this->matchLoose = $lost->get();
        $this->awaiting = $awaiting;
    }

    public function render()
    {
        return view('livewire.user.profil');
    }
}
