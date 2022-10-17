<?php

namespace App\Http\Livewire\Frontend\About;

use App\Models\AboutOverview;
use Livewire\Component;

class OverviewComponent extends Component
{
    public $overview;

    public function render()
    {
        $this->overview = AboutOverview::where('id', 1)->first();

        return view('livewire.frontend.about.overview-component')->layout('livewire.frontend.layouts.base');
    }
}
