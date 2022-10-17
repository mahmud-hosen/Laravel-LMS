<?php

namespace App\Http\Livewire\Admin\Faculty;

use App\Models\FacultyPrePrimary;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class FacultyPrePrimaryComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $sortingValue, $searchTerm, $name, $designation, $image, $uploadedImage, $email, $data_id, $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function mount()
    {
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'designation' => 'required',
        ]);
    }

    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
        ]);

        $data = new FacultyPrePrimary();
        $data->name = $this->name;
        $data->designation = $this->designation;

        if ($this->image != '') {
            $imageName = Carbon::now()->timestamp . '_image.' . $this->image->extension();
            $this->image->storeAs('all', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        $this->resetInputs();

        $this->dispatchBrowserEvent('success', ['message' => 'Data added successfully']);
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editData($id)
    {
        $this->data_id = $id;

        $data = FacultyPrePrimary::where('id', $id)->first();
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

        $data = FacultyPrePrimary::where('id', $this->data_id)->first();
        $data->name = $this->name;
        $data->designation = $this->designation;
        $data->image = $this->uploadedImage;
        if ($this->image != '') {
            $imageName = Carbon::now()->timestamp . '_image.' . $this->image->extension();
            $this->image->storeAs('all', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        $this->resetInputs();

        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
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
        $this->resetInputs();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteData()
    {
        $link = FacultyPrePrimary::where('id', $this->delete_id)->first();
        $link->delete();

        $this->delete_id = '';
        $this->dispatchBrowserEvent('delete_success');
    }

    public function render()
    {
        $faculties = FacultyPrePrimary::where('name', 'like', '%' . $this->searchTerm . '%')->orWhere('designation', 'like', '%' . $this->searchTerm . '%')->paginate($this->sortingValue);

        return view('livewire.admin.faculty.faculty-pre-primary-component', ['faculties' => $faculties])->layout('livewire.admin.layouts.base');
    }
}
