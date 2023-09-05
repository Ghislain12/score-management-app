<?php

namespace App\Livewire\Bet;

use App\Models\Bet;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $match;

    public function mount($id)
    {
        $this->match = $id;
    }

    public function render()
    {
        return view('livewire.bet.index');
    }

    public function saveBet()
    {
        $newBet = new Bet();

        DB::transaction(
            callback: fn (): bool => $newBet->forceFill([
                'encounter_id',
                'user_id',
                'team_id'
            ])->save()
        );
    }
}
