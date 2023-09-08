<?php

namespace App\Livewire;

use App\Events\RequestTreatment;
use App\Models\Encounter;
use App\Models\MatchDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CurrentMatch extends Component
{
    public $title;

    public $content;

    public $scorerTeam;

    public $goal;

    public $match;

    protected $listeners = ['echo:request-treatment,RequestTreatment' => 'refreshPage'];

    public function refreshPage()
    {
        $this->match = Encounter::with(['event' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
            ->whereNull('end_date')
            ->where('start_date', '<', date('Y-m-d H:i'))
            ->first();
    }

    public function saveDetail()
    {
        $this->validate(
            rules: [
                'title' => ['required', 'string'],
                'content' => ['required', 'string'],
                'goal' => ['nullable'],
                'scorerTeam' => ['required_if:goal,true']
            ],
            messages: [
                '*.required' => ['Veuillez renseigné ce champ']
            ]
        );

        $newEvent = new MatchDetail();

        DB::transaction(
            callback: fn (): bool => $newEvent->forceFill(
                attributes: [
                    'encounter_id' => $this->match->id,
                    'event' => $this->content,
                    'title' => $this->title
                ]
            )->save(),
        );

        if ($this->goal) {
            if ($this->match->first_team == $this->scorerTeam) {
                $this->match->first_team_score += 1;
                $this->match->save();
            }
            if ($this->match->second_team == $this->scorerTeam) {
                $this->match->second_team_score += 1;
                $this->match->save();
            }
        }

        $this->match = Encounter::with(['event' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
            ->whereNull('end_date')
            ->where('start_date', '<', date('Y-m-d H:i'))
            ->first();

        $this->reset('title', 'content');

        event(new RequestTreatment);
    }

    public function mount()
    {
        $this->match = Encounter::with(['event' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
            ->whereNull('end_date')
            ->where('start_date', '<', date('Y-m-d H:i'))
            ->first();
    }

    public function closeMatch(int $matchId)
    {
        Encounter::find($matchId)->update([
            'end_date' => date('Y-m-d H:i:s')
        ]);

        MatchDetail::create([
            'encounter_id' => $this->match->id,
            'event' => 'C\'est la fin de la rencontre entre ' . $this->match->firstTeam->name . ' et ' . $this->match->secondTeam->name,
            'title' => 'Fin de la rencontre'
        ]);

        $this->match = Encounter::with(['event' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
            ->whereNull('end_date')
            ->where('start_date', '<', date('Y-m-d H:i'))
            ->first();

        event(new RequestTreatment);
    }

    public function render()
    {
        return view('livewire.current-match');
    }
}
