<?php

namespace App\Http\Livewire\Admin\Websitesetup;

use App\Models\SettingHeader;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class HeaderComponent extends Component
{
    use WithFileUploads;

    public $logo, $uploadedLogo, $title, $sub_title;

    public function mount()
    {
        $getData = SettingHeader::where('id', 1)->first();

        if ($getData != '') {
            $this->uploadedLogo = $getData->logo;
            $this->title = $getData->title;
            $this->sub_title = $getData->subtitle;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'logo' => 'required_if:uploadedLogo,null',
            'title' => 'required',
            'sub_title' => 'required',
        ], [
            'logo.required_if' => 'The logo field is required',
        ]);
    }

    public function storeData()
    {
        $this->validate([
            'logo' => 'required_if:uploadedLogo,null',
            'title' => 'required',
            'sub_title' => 'required',
        ], [
            'logo.required_if' => 'The logo field is required',
        ]);


        $getData = SettingHeader::where('id', 1)->first();

        if ($getData != '') {
            $data = $getData;
        } else {
            $data = new SettingHeader();
        }

        $data->title = $this->title;
        $data->subtitle = $this->sub_title;
        $data->logo = $this->uploadedLogo;

        if ($this->logo != '') {
            $logoName = Carbon::now()->timestamp . '_logo.' . $this->logo->extension();
            $this->logo->storeAs('all', $logoName);
            $data->logo = $logoName;
        }

        $data->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
    }

    public function render()
    {
        return view('livewire.admin.websitesetup.header-component')->layout('livewire.admin.layouts.base');
    }
}
