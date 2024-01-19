<?php

namespace App\Livewire;

use App\Services\Contest;
use Livewire\Attributes\On;
use Livewire\Component;

class ContestCards extends Component
{

    public $contests;
    public $loading = true;

    public function mount()
    {
        $this->dispatch('loadContests');
    }

    #[On('loadContests')]
    public function loadContests()
    {
        $this->contests = Contest::getLatestsContests(8);

        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.contest-cards');
    }
}
