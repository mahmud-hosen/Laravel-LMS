<?php

namespace App\Http\Livewire\Frontend\About;

use Livewire\Component;

class MessageFromChairpatronComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.about.message-from-chairpatron-component')->layout('livewire.frontend.layouts.base');
    }
}
