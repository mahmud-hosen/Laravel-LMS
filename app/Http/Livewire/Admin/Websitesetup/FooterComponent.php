<?php

namespace App\Http\Livewire\Admin\Websitesetup;

use App\Models\SettingFooter;
use App\Models\SettingFooterLinks;
use Livewire\Component;
use Livewire\WithPagination;

class FooterComponent extends Component
{
    use WithPagination;

    public $location_line1, $location_line2, $time_from, $time_to, $day_from, $day_to, $phone, $email, $copyright_text;

    public $sortingValue, $searchTerm, $title, $link, $link_id, $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function mount()
    {
        $getData = SettingFooter::where('id', 1)->first();

        if ($getData != '') {
            $this->location_line1 = $getData->location_line1;
            $this->location_line2 = $getData->location_line2;
            $this->time_from = $getData->hours_time_from;
            $this->time_to = $getData->hours_time_to;
            $this->day_from = $getData->hours_day_from;
            $this->day_to = $getData->hours_day_to;
            $this->phone = $getData->phone;
            $this->email = $getData->email;
            $this->copyright_text = $getData->copyright_text;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'location_line1' => 'required',
            'location_line2' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'day_from' => 'required',
            'day_to' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'copyright_text' => 'required',

            'title' => 'required',
            'link' => 'required',
        ]);
    }

    public function storeData()
    {
        $this->validate([
            'location_line1' => 'required',
            'location_line2' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'day_from' => 'required',
            'day_to' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'copyright_text' => 'required',
        ]);

        $getData = SettingFooter::where('id', 1)->first();

        if ($getData != '') {
            $data = $getData;
        } else {
            $data = new SettingFooter();
        }

        $data->location_line1 = $this->location_line1;
        $data->location_line2 = $this->location_line2;
        $data->hours_time_from = $this->time_from;
        $data->hours_time_to = $this->time_to;
        $data->hours_day_from = $this->day_from;
        $data->hours_day_to = $this->day_to;
        $data->phone = $this->phone;
        $data->email = $this->email;
        $data->copyright_text = $this->copyright_text;
        $data->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
    }

    public function storeLink()
    {
        $this->validate([
            'title' => 'required',
            'link' => 'required',
        ]);

        $addlink = new SettingFooterLinks();
        $addlink->title = $this->title;
        $addlink->link = $this->link;
        $addlink->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Link added successfully']);
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editLink($id)
    {
        $this->link_id = $id;
        $link = SettingFooterLinks::where('id', $id)->first();
        $this->title = $link->title;
        $this->link = $link->link;

        $this->dispatchBrowserEvent('showEditModal');
    }

    public function updateLink()
    {
        $this->validate([
            'title' => 'required',
            'link' => 'required',
        ]);

        $addlink = SettingFooterLinks::where('id', $this->link_id)->first();
        $addlink->title = $this->title;
        $addlink->link = $this->link;
        $addlink->save();

        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('success', ['message' => 'Link updated successfully']);
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->title = '';
        $this->link = '';
        $this->link_id = '';
    }

    public function close()
    {
        $this->dispatchBrowserEvent('closeModal');
        $this->resetInputs();
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteData()
    {
        $link = SettingFooterLinks::where('id', $this->delete_id)->first();
        $link->delete();

        $this->dispatchBrowserEvent('delete_success');

        $this->delete_id = '';
    }

    public function render()
    {
        $links = SettingFooterLinks::paginate(10);

        return view('livewire.admin.websitesetup.footer-component', ['links' => $links])->layout('livewire.admin.layouts.base');
    }
}
