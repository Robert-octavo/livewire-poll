<?php

namespace App\Livewire;

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

    public function mount()
    {
        $this->options = [''];
    }
}
