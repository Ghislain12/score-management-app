<?php

namespace App\Livewire\Teams;

use App\Models\Encounter;
use App\Models\Team;
use Livewire\Component;

class Show extends Component
{
    public $details;

    public int $team;

    public $data;

    public function mount()
    {
        $this->data = Team::where('id', $this->team)->first();
        $this->details = Encounter::where('first_team', $this->team)->orwhere('second_team', $this->team)->get();
    }

    public function render()
    {
        // dd($this->details);
        return view('livewire.teams.show');
    }
}
