<?php

namespace App\Http\Livewire\Frontend\Academic;

use Livewire\Component;

class CoordinatorComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.academic.coordinator-component')->layout('livewire.frontend.layouts.base');
    }
}
