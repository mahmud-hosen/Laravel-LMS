<?php

namespace App\Http\Livewire\Frontend\Oncampus;

use App\Models\OnCampusGallery;
use Livewire\Component;

class OnCampusComponent extends Component
{


    public function render()
    {
        $gallaries = OnCampusGallery::where('status', 1)->get();

        return view('livewire.frontend.oncampus.on-campus-component', ['gallaries' => $gallaries])->layout('livewire.frontend.layouts.base');
    }
}
