<?php

namespace App\Http\Livewire\Frontend\Faculty;

use App\Models\FacultyHighSchool;
use Livewire\Component;

class FacultyHighSchoolComponent extends Component
{
    public function render()
    {
        $principal = FacultyHighSchool::where('designation', 'Principal')->where('status', 1)->first();
        $vicePrincipal = FacultyHighSchool::where('designation', 'Vice-Principal')->where('status', 1)->first();
        $teachers = FacultyHighSchool::where('designation', 'Teacher')->where('status', 1)->get();

        return view('livewire.frontend.faculty.faculty-high-school-component', ['principal' => $principal, 'vicePrincipal' => $vicePrincipal, 'teachers' => $teachers])->layout('livewire.frontend.layouts.base');
    }
}
