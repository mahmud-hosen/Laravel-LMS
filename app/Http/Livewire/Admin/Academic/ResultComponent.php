<?php

namespace App\Http\Livewire\Admin\Academic;

use App\Models\Result;
use App\Models\ResultClass;
use App\Models\ResultExams;
use App\Models\ResultSession;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ResultComponent extends Component
{
    public $uiStatus = '';

    use WithPagination;
    use WithFileUploads;

    public $sortingValue, $searchTerm, $student_id, $session, $exam, $class, $cgpa, $data_id, $delete_id;
    public $sessions, $exams, $classes;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'student_id' => 'required|numeric',
            'session' => 'required',
            'exam' => 'required',
            'class' => 'required',
            'cgpa' => 'required',
        ]);
    }


    public function storeData()
    {
        $this->validate([
            'student_id' => 'required|numeric',
            'session' => 'required',
            'exam' => 'required',
            'class' => 'required',
            'cgpa' => 'required',
        ]);

        $getResult = Result::where('student_id', $this->student_id)->where('session', $this->session)->where('class', $this->class)->where('exam', $this->exam)->first();

        if ($getResult != '') {
            $this->dispatchBrowserEvent('error', ['message' => 'Result already added']);
        } else {
            $data = new Result();
            $data->student_id = $this->student_id;
            $data->session = $this->session;
            $data->class = $this->class;
            $data->exam = $this->exam;
            $data->gpa = $this->cgpa;

            $data->save();

            $this->resetInputs();

            $this->dispatchBrowserEvent('success', ['message' => 'Data added successfully']);
            $this->dispatchBrowserEvent('closeModal');
        }
    }

    public function editData($id)
    {
        $this->data_id = $id;

        $data = Result::where('id', $id)->first();
        $this->student_id = $data->student_id;
        $this->session = $data->session;
        $this->class = $data->class;
        $this->exam = $data->exam;
        $this->cgpa = $data->gpa;

        $this->dispatchBrowserEvent('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'student_id' => 'required|numeric',
            'session' => 'required',
            'exam' => 'required',
            'class' => 'required',
            'cgpa' => 'required',
        ]);

        $getResult = Result::where('student_id', $this->student_id)->where('session', $this->session)->where('class', $this->class)->where('exam', $this->exam)->first();

        if ($getResult != '') {
            $this->dispatchBrowserEvent('error', ['message' => 'Result already added']);
        } else {
            $data = Result::where('id', $this->data_id)->first();
            $data->student_id = $this->student_id;
            $data->session = $this->session;
            $data->class = $this->class;
            $data->exam = $this->exam;
            $data->gpa = $this->cgpa;
            $data->save();

            $this->resetInputs();

            $this->dispatchBrowserEvent('closeModal');
            $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
        }
    }

    public function resetInputs()
    {
        $this->student_id = '';
        $this->session = '';
        $this->class = '';
        $this->exam = '';
        $this->cgpa = '';
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
        $link = Result::where('id', $this->delete_id)->first();
        $link->delete();

        $this->delete_id = '';
        $this->dispatchBrowserEvent('delete_success');
    }


    public function changeUI($value)
    {
        $this->uiStatus = $value;
    }

    public function addSession()
    {
        $this->validate([
            'session' => 'required|unique:result_sessions',
        ], [
            'session.unique' => 'This session already added',
        ]);

        $session = new ResultSession();
        $session->session = $this->session;
        $session->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Session added']);

        $this->session = '';
        $this->uiStatus = '';
    }

    public function deleteSession($id)
    {
        $session = ResultSession::where('id', $id)->first();
        $session->delete();

        $this->dispatchBrowserEvent('error', ['message' => 'Session deleted']);
    }

    public function addExam()
    {
        $this->validate([
            'exam' => 'required|unique:result_exams',
        ], [
            'exam.unique' => 'This exam already added',
        ]);

        $exam = new ResultExams();
        $exam->exam = $this->exam;
        $exam->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Exam added']);

        $this->exam = '';
        $this->uiStatus = '';
    }

    public function deleteExam($id)
    {
        $exam = ResultExams::where('id', $id)->first();
        $exam->delete();

        $this->dispatchBrowserEvent('error', ['message' => 'Exam deleted']);
    }

    public function addClass()
    {
        $this->validate([
            'class' => 'required|unique:result_classes',
        ], [
            'class.unique' => 'This class already added',
        ]);

        $class = new ResultClass();
        $class->class = $this->class;
        $class->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Class added']);

        $this->class = '';
        $this->uiStatus = '';
    }

    public function deleteClass($id)
    {
        $class = ResultClass::where('id', $id)->first();
        $class->delete();

        $this->dispatchBrowserEvent('error', ['message' => 'Class deleted']);
    }

    public function render()
    {
        $this->sessions = ResultSession::get();
        $this->exams = ResultExams::get();
        $this->classes = ResultClass::get();
        $results = Result::where('student_id', 'like', '%' . $this->searchTerm . '%')->orWhere('session', 'like', '%' . $this->searchTerm . '%')->orWhere('class', 'like', '%' . $this->searchTerm . '%')->orWhere('exam', 'like', '%' . $this->searchTerm . '%')->orWhere('gpa', 'like', '%' . $this->searchTerm . '%')->orderBy('created_at', 'DESC')->paginate($this->sortingValue);

        return view('livewire.admin.academic.result-component', ['results' => $results])->layout('livewire.admin.layouts.base');
    }
}
