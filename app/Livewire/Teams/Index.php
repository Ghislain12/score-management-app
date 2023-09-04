<?php

namespace App\Livewire\Teams;

use App\Http\Commands\Followers\CreateNewFollower;
use App\Models\Follower;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $teams;

    public function mount()
    {
        $this->teams = Team::withCount('follower')->get();
    }

    public function follower(Team $team)
    {
        if (Auth::user()) {
            $follower = new Follower();
            DB::transaction(
                callback: fn (): bool => $follower->forceFill(
                    attributes: [
                        'team_id' => $team->id,
                        'user_id' => Auth::user()->id,
                    ]
                )->save(),
            );
            $this->teams = Team::withCount('follower')->get();
        } else {
            return redirect()->route('login:login')->with('Veuillez vous connecter pour vous abonner');
        }
    }

    public function unFollow(Team $team)
    {
        Follower::where('user_id', Auth::user()->id)->where('team_id', $team->id)->first()->delete();
        $this->teams = Team::withCount('follower')->get();
    }

    public function render()
    {
        return view('livewire.teams.index');
    }
}
