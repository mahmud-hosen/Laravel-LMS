<?php

namespace App\Http\Livewire\Frontend\Admission;

use Livewire\Component;

class AdmissionComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.admission.admission-component')->layout('livewire.frontend.layouts.base');
    }
}
