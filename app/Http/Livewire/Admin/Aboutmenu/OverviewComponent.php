<?php

namespace App\Http\Livewire\Admin\Aboutmenu;

use App\Models\AboutOverview;
use Livewire\Component;

class OverviewComponent extends Component
{
    public $history, $motto, $vision, $mission, $objectives;

    public function mount()
    {
        $getData = AboutOverview::where('id', 1)->first();

        if ($getData != '') {
            $this->history = $getData->history;
            $this->motto = $getData->motto;
            $this->vision = $getData->vision;
            $this->mission = $getData->mission;
            $this->objectives = $getData->objectives;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'history' => 'required',
            'motto' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'objectives' => 'required',
        ]);
    }

    public function storeData()
    {
        $this->validate([
            'history' => 'required',
            'motto' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'objectives' => 'required',
        ]);


        $getData = AboutOverview::where('id', 1)->first();

        if ($getData != '') {
            $data = $getData;
        } else {
            $data = new AboutOverview();
        }

        $data->history = $this->history;
        $data->motto = $this->motto;
        $data->vision = $this->vision;
        $data->mission = $this->mission;
        $data->objectives = $this->objectives;
        $data->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
    }


    public function render()
    {
        return view('livewire.admin.aboutmenu.overview-component')->layout('livewire.admin.layouts.base');
    }
}
