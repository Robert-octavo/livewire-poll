<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Poll;

class Polls extends Component
{
    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->get();
        return view('livewire.polls', compact('polls'));
    }
}
