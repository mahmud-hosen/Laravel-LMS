<?php

namespace App\Http\Livewire\Frontend\Faculty;

use App\Models\FacultyCollege;
use Livewire\Component;

class FacultyCollegeComponent extends Component
{
    public function render()
    {
        $principal = FacultyCollege::where('designation', 'Principal')->where('status', 1)->first();
        $vicePrincipal = FacultyCollege::where('designation', 'Vice-Principal')->where('status', 1)->first();
        $teachers = FacultyCollege::where('designation', 'Teacher')->where('status', 1)->get();

        return view('livewire.frontend.faculty.faculty-college-component', ['principal' => $principal, 'vicePrincipal' => $vicePrincipal, 'teachers' => $teachers])->layout('livewire.frontend.layouts.base');
    }
}
