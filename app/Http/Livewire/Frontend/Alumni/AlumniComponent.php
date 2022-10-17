<?php

namespace App\Http\Livewire\Frontend\Alumni;

use App\Models\Alumni;
use Livewire\Component;

class AlumniComponent extends Component
{
    public function render()
    {
        $principals = Alumni::where('designation', 'Ex-Principal')->where('status', 1)->get();
        $vicePrincipals = Alumni::where('designation', 'Ex-VicePrincipal')->where('status', 1)->get();
        $teachers = Alumni::where('designation', 'Ex-Teacher')->where('status', 1)->get();

        return view('livewire.frontend.alumni.alumni-component', ['principals' => $principals, 'vicePrincipals' => $vicePrincipals, 'teachers' => $teachers])->layout('livewire.frontend.layouts.base');
    }
}
