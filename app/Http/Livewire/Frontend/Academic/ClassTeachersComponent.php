<?php

namespace App\Http\Livewire\Frontend\Academic;

use App\Models\AcademicClassTeacher;
use Livewire\Component;
use Livewire\WithPagination;

class ClassTeachersComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $teachers = AcademicClassTeacher::paginate(15);

        return view('livewire.frontend.academic.class-teachers-component', ['teachers' => $teachers])->layout('livewire.frontend.layouts.base');
    }
}
