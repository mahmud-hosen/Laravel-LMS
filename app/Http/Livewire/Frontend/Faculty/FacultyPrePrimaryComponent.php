<?php

namespace App\Http\Livewire\Frontend\Faculty;

use App\Models\FacultyPrePrimary;
use Livewire\Component;

class FacultyPrePrimaryComponent extends Component
{
    public function render()
    {
        $principal = FacultyPrePrimary::where('designation', 'Principal')->where('status', 1)->first();
        $vicePrincipal = FacultyPrePrimary::where('designation', 'Vice-Principal')->where('status', 1)->first();
        $teachers = FacultyPrePrimary::where('designation', 'Teacher')->where('status', 1)->get();

        return view('livewire.frontend.faculty.faculty-pre-primary-component', ['principal' => $principal, 'vicePrincipal' => $vicePrincipal, 'teachers' => $teachers])->layout('livewire.frontend.layouts.base');
    }
}
