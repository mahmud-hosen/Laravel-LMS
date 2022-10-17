<?php

namespace App\Http\Livewire\Frontend\Onlineclassroom;

use Livewire\Component;

class OverviewComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.onlineclassroom.overview-component')->layout('livewire.frontend.layouts.base');
    }
}
