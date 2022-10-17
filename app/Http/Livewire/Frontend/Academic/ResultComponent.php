<?php

namespace App\Http\Livewire\Frontend\Academic;

use App\Models\Result;
use App\Models\ResultClass;
use App\Models\ResultExams;
use App\Models\ResultSession;
use Livewire\Component;

class ResultComponent extends Component
{
    public $session, $class, $exam, $student_id;

    public $result;

    public $sessions, $exams, $classes;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'session' => 'required',
            'class' => 'required',
            'exam' => 'required',
            'student_id' => 'required',
        ]);
    }

    public function getResult()
    {
        $this->validate([
            'session' => 'required',
            'class' => 'required',
            'exam' => 'required',
            'student_id' => 'required',
        ]);

        $this->result = Result::where('student_id', $this->student_id)->where('session', $this->session)->where('class', $this->class)->where('exam', $this->exam)->first();

        $this->dispatchBrowserEvent('showResult');
    }

    public function render()
    {
        $this->sessions = ResultSession::get();
        $this->exams = ResultExams::get();
        $this->classes = ResultClass::get();

        // $results = Result::where('student_id', 'like', '%' . $this->searchTerm . '%')->orWhere('session', 'like', '%' . $this->searchTerm . '%')->orWhere('class', 'like', '%' . $this->searchTerm . '%')->orWhere('exam', 'like', '%' . $this->searchTerm . '%')->orWhere('gpa', 'like', '%' . $this->searchTerm . '%')->paginate($this->sortingValue);

        return view('livewire.frontend.academic.result-component')->layout('livewire.frontend.layouts.base');
    }
}
