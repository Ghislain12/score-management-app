<?php

namespace App\Livewire\Plans;

use App\Models\Bet;
use App\Models\Encounter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;


    public  $data, $bet, $succesMessage = false;

    public function modalData(int $id)
    {
        if (Auth::user()) {
            $this->reset();
            $this->data = Encounter::where('id', $id)->first();
        } else {
            return redirect()->route('login:login');
        }
    }

    public function render()
    {
        return view('livewire.plans.index', [
            'matchs' => Encounter::where('start_date', '>', date('Y-m-d H:i:s'))->orderBy('start_date')->paginate(5),
        ]);
    }

    public function saveBet()
    {
        $this->validate(
            rules: [
                'bet' => ['required', 'in:V1,X,V2']
            ],
            messages: [
                '*.required' => 'Veuillez choisir une option',
                '*.in' => 'Veuillez choisir une option exacte'
            ],
        );

        $newBet = new Bet();

        DB::transaction(
            callback: fn () => $newBet->forceFill(
                attributes: [
                    'encounter_id' => $this->data->id,
                    'user_id' => Auth::user()->id,
                    'bet' => $this->bet
                ]
            )->save()
        );

        $this->succesMessage = true;
    }
}
