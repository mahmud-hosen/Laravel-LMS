<?php

namespace App\Http\Livewire\Frontend\About;

use App\Models\AboutMessageFromChairman;
use App\Models\AboutRollOfHonour;
use Livewire\Component;

class MessageFromChairmanComponent extends Component
{
    public $msg, $rolls;

    public function render()
    {
        $this->msg = AboutMessageFromChairman::where('id', 1)->first();
        $this->rolls = AboutRollOfHonour::get();

        return view('livewire.frontend.about.message-from-chairman-component')->layout('livewire.frontend.layouts.base');
    }
}
