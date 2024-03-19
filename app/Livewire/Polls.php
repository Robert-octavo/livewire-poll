<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Poll;
use App\Models\Option;

class Polls extends Component
{
    protected $listeners = [
        'pollCreated' => 'render'
    ];

    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->get();
        return view('livewire.polls', compact('polls'));
    }

    public function vote(Option $option) // $option is the option that was clicked
    {
        $option->votes()->create();
        // $this->emit('pollCreated');
    }
}
