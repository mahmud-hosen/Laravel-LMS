<?php

namespace App\Http\Livewire\Frontend\Faculty;

use App\Models\FacultyPrimary;
use Livewire\Component;

class FacultyPrimaryComponent extends Component
{
    public function render()
    {
        $principal = FacultyPrimary::where('designation', 'Principal')->where('status', 1)->first();
        $vicePrincipal = FacultyPrimary::where('designation', 'Vice-Principal')->where('status', 1)->first();
        $teachers = FacultyPrimary::where('designation', 'Teacher')->where('status', 1)->get();

        return view('livewire.frontend.faculty.faculty-primary-component', ['principal' => $principal, 'vicePrincipal' => $vicePrincipal, 'teachers' => $teachers])->layout('livewire.frontend.layouts.base');
    }
}
