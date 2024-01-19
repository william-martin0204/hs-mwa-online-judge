<?php

namespace App\Livewire;

use App\Services\ContestService;
use Exception;
use Livewire\Attributes\On;
use Livewire\Component;

class ContestCards extends Component
{

    public $contests;
    public $loading = true;
    public $failed = false;

    public function mount()
    {
        $this->dispatch('loadContests');
    }

    #[On('loadContests')]
    public function loadContests()
    {
        try {
            $this->contests = ContestService::getLatestsContests(8);
        } catch (Exception $e) {
            $this->failed = true;
        }

        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.contest-cards');
    }
}
