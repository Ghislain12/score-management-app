<?php

namespace App\Livewire\Teams;

use App\Models\Team;
use Livewire\Component;

class Index extends Component
{
    public $teams;

    public function mount()
    {
        $this->teams = Team::all();
    }

    public function render()
    {
        return view('livewire.teams.index');
    }

    public function addFollowers(Team $team)
    {
        $team->increment('followers');
        $this->mount();
    }
}
