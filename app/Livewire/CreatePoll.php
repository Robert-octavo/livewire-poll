<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = [''];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]); // remove the option from the array
        $this->options = array_values($this->options); // reset array keys
    }

    public function createPoll()
    {
        $this->validate([
            'title' => 'required',
            'options.*' => 'required'
        ]);

        // Create the poll

        // $poll = Poll::create([
        //     'title' => $this->title
        // ]);

        // foreach ($this->options as $option) {
        //     $poll->options()->create([
        //         'name' => $option
        //     ]);
        // }

        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
            collect($this->options) // convert the options to a collection
                ->map(fn ($option) => ['name' => $option]) // map each option to an array
                ->all() // convert the collection back to an array
        );

        $this->reset(['title', 'options']); // reset the form
    }

    public function mount()
    {
        $this->options = [''];
    }
}
