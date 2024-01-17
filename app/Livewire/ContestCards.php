<?php

namespace App\Livewire;

use Livewire\Component;

class ContestCards extends Component
{

    public $contests;

    public function mount($contests)
    {
        $this->contests = $contests;
    }

    public function render()
    {
        return view('livewire.contest-cards');
    }
}
