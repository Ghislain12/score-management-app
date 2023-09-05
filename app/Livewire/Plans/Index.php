<?php

namespace App\Livewire\Plans;

use App\Models\Encounter;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $name;

    public  $data;

    public $modaldata = null;

    public $count = 1;
 
    public function increment()
    {
        $this->count++;
    }

    public function modalData(int $id)
    {
        // dd('fg')
        // $this->dispatch('post-created', matchId: $id)->self();
        $this->name = 'edgtgtgthththyhy';
    }

    public function mount() {
        $this->name = 'dfjvn';
    }

    public function render()
    {
        return view('livewire.plans.index', [
            'matchs' => Encounter::where('start_date', '>', date('Y-m-d H:i:s'))->orderBy('start_date')->paginate(5),
        ]);
    }
}
