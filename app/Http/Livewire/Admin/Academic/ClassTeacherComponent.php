<?php

namespace App\Http\Livewire\Admin\Academic;

use App\Models\AcademicClassTeacher;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ClassTeacherComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $sortingValue, $searchTerm, $name, $designation, $image, $uploadedImage, $email, $mobile, $data_id, $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function mount()
    {
        // $getData = AcademicClassTeacher::where('id', 1)->first();

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
            'mobile' => 'required',
        ]);
    }

    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
            'mobile' => 'required',
        ]);

        $data = new AcademicClassTeacher();
        $data->name = $this->name;
        $data->designation = $this->designation;
        $data->mobile = $this->mobile;

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

        $data = AcademicClassTeacher::where('id', $id)->first();
        $this->name = $data->name;
        $this->designation = $data->designation;
        $this->uploadedImage = $data->image;
        $this->mobile = $data->mobile;

        $this->dispatchBrowserEvent('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'name' => 'required',
            'designation' => 'required',
            'mobile' => 'required',
        ]);

        $data = AcademicClassTeacher::where('id', $this->data_id)->first();
        $data->name = $this->name;
        $data->designation = $this->designation;
        $data->mobile = $this->mobile;
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
        $this->mobile = '';
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
        $link = AcademicClassTeacher::where('id', $this->delete_id)->first();
        $link->delete();

        $this->delete_id = '';
        $this->dispatchBrowserEvent('delete_success');
    }

    public function render()
    {
        $teachers = AcademicClassTeacher::where('name', 'like', '%' . $this->searchTerm . '%')->orWhere('designation', 'like', '%' . $this->searchTerm . '%')->orWhere('mobile', 'like', '%' . $this->searchTerm . '%')->paginate($this->sortingValue);

        return view('livewire.admin.academic.class-teacher-component', ['teachers' => $teachers])->layout('livewire.admin.layouts.base');
    }
}
