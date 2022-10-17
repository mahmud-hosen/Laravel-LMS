<?php

namespace App\Http\Livewire\Admin;

use App\Models\AboutGoverningBody;
use App\Models\AcademicClassTeacher;
use App\Models\Alumni;
use App\Models\FacultyCollege;
use App\Models\FacultyHighSchool;
use App\Models\FacultyPrimary;
use App\Models\HomepageEvent;
use App\Models\PublicationArticle;
use App\Models\PublicationYearlyMagazine;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $totalTeacher;
    public $totalGoverningBody;
    public $totalAlumni;
    public $totalArticle;
    public $totalMagazines;
    public $totalEvents;
    public $totalFacultyCollege;
    public $totalFacultyHighSchool;
    public $totalFacultyPrimary;

    public function render()
    {
        $this->totalTeacher = AcademicClassTeacher::get()->count();
        $this->totalGoverningBody = AboutGoverningBody::get()->count();
        $this->totalAlumni = Alumni::get()->count();
        $this->totalArticle = PublicationArticle::get()->count();
        $this->totalMagazines = PublicationYearlyMagazine::get()->count();
        $this->totalEvents = HomepageEvent::get()->count();
        $this->totalFacultyCollege = FacultyCollege::get()->count();
        $this->totalFacultyHighSchool = FacultyHighSchool::get()->count();
        $this->totalFacultyPrimary = FacultyPrimary::get()->count();

        return view('livewire.admin.dashboard-component')->layout('livewire.admin.layouts.base');
    }
}
