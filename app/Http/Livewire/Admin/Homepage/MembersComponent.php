<?php

namespace App\Http\Livewire\Admin\Homepage;

use App\Models\HomepageMembers;
use Livewire\Component;
use Livewire\WithFileUploads;

class MembersComponent extends Component
{
    use WithFileUploads;

    public $student, $teacher, $classroom, $admin_staff;

    public function mount()
    {
        $getData = HomepageMembers::where('id', 1)->first();

        if ($getData != '') {
            $this->student = $getData->student;
            $this->teacher = $getData->teacher;
            $this->classroom = $getData->classroom;
            $this->admin_staff = $getData->admin_staff;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'student' => 'required',
            'teacher' => 'required',
            'classroom' => 'required',
            'admin_staff' => 'required',
        ]);
    }

    public function storeData()
    {
        $this->validate([
            'student' => 'required',
            'teacher' => 'required',
            'classroom' => 'required',
            'admin_staff' => 'required',
        ]);


        $getData = HomepageMembers::where('id', 1)->first();

        if ($getData != '') {
            $data = $getData;
        } else {
            $data = new HomepageMembers();
        }

        $data->student = $this->student;
        $data->teacher = $this->teacher;
        $data->classroom = $this->classroom;
        $data->admin_staff = $this->admin_staff;
        $data->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
    }

    public function render()
    {
        return view('livewire.admin.homepage.members-component')->layout('livewire.admin.layouts.base');
    }
}
