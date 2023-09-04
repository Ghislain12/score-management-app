<?php

namespace App\Livewire\Plans;

use App\Models\Encounter;
use Livewire\Component;

class Index extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.plans.index', [
            'matchs' => Encounter::all(),
        ]);
    }
}
