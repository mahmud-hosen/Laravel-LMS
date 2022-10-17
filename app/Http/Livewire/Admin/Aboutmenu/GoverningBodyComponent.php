<?php

namespace App\Http\Livewire\Admin\Aboutmenu;

use App\Models\AboutGoverningBody;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class GoverningBodyComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $sortingValue, $searchTerm, $name, $designation, $image, $uploadedImage, $data_id, $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function mount()
    {
        // $getData = AboutGoverningBody::where('id', 1)->first();

        // if ($getData != '') {
        //     $this->name = $getData->name;
        //     $this->designation = $getData->designation;
        //     $this->uploadedImage = $getData->image;
        // }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
        ]);
    }

    public function changeSL($id, $value)
    {
        $data = AboutGoverningBody::where('id', $id)->first();
        $data->serial = $value;
        $data->save();
    }

    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
        ]);

        $data = new AboutGoverningBody();
        $data->name = $this->name;
        $data->designation = $this->designation;
        $data->designation = $this->designation;

        if ($this->image != '') {
            $imageName = Carbon::now()->timestamp . '_image.' . $this->image->extension();
            $this->image->storeAs('all', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Data added successfully']);
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editData($id)
    {
        $this->data_id = $id;

        $data = AboutGoverningBody::where('id', $id)->first();
        $this->name = $data->name;
        $this->designation = $data->designation;
        $this->uploadedImage = $data->image;

        $this->dispatchBrowserEvent('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'name' => 'required',
            'designation' => 'required',
        ]);

        $data = AboutGoverningBody::where('id', $this->data_id)->first();
        $data->name = $this->name;
        $data->designation = $this->designation;
        $data->image = $this->uploadedImage;
        if ($this->image != '') {
            $imageName = Carbon::now()->timestamp . '_image.' . $this->image->extension();
            $this->image->storeAs('all', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->designation = '';
        $this->image = '';
        $this->uploadedImage = '';
        $this->data_id = '';
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
        $link = AboutGoverningBody::where('id', $this->delete_id)->first();
        $link->delete();

        $this->dispatchBrowserEvent('delete_success');

        $this->delete_id = '';
    }

    public function render()
    {
        $lists = AboutGoverningBody::where('name', 'like', '%' . $this->searchTerm . '%')->paginate($this->sortingValue);

        return view('livewire.admin.aboutmenu.governing-body-component', ['lists' => $lists])->layout('livewire.admin.layouts.base');
    }
}
