<?php

namespace App\Http\Livewire\Frontend\About;

use App\Models\AboutGoverningBody;
use Livewire\Component;

class GoverningBodyComponent extends Component
{
    public $items;

    public function render()
    {
        $this->items = AboutGoverningBody::orderBy('serial', 'ASC')->get();

        return view('livewire.frontend.about.governing-body-component')->layout('livewire.frontend.layouts.base');
    }
}
