<?php

namespace App\Http\Livewire\Admin\Aboutmenu;

use App\Models\AboutMessageFromChairman;
use App\Models\AboutRollOfHonour;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class MessageFromChairmanComponent extends Component
{
    use WithFileUploads;
    public $name, $image, $uploadedImage, $message;
    public $roll_name, $roll_image, $uploadedRollImage, $date_from, $date_to;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function mount()
    {
        $getDetails = AboutMessageFromChairman::where('id', 1)->first();

        if ($getDetails != '') {
            $this->name = $getDetails->name;
            $this->uploadedImage = $getDetails->image;
            $this->message = $getDetails->message;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'image' => 'required_if:uploadedImage,null',
            'message' => 'required',

            'roll_name' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'roll_image' => 'required',
        ], [
            'image.required_if' => 'The image field is required',
        ]);
    }

    public function storeDetails()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required_if:uploadedImage,null',
            'message' => 'required',
        ], [
            'image.required_if' => 'The image field is required',
        ]);

        $getDetails = AboutMessageFromChairman::where('id', 1)->first();

        if ($getDetails != '') {
            $details = $getDetails;
        } else {
            $details = new AboutMessageFromChairman();
        }

        $details->name = $this->name;
        $details->message = $this->message;
        if ($this->image != '') {
            $imageName = Carbon::now()->timestamp . '_image.' . $this->image->extension();
            $this->image->storeAs('all', $imageName);
            $details->image = $imageName;
        }
        $details->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
    }


    public function storeData()
    {
        $this->validate([
            'roll_name' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'roll_image' => 'required',
        ]);

        $data = new AboutRollOfHonour();
        $data->name = $this->roll_name;
        $data->date_from = $this->date_from;
        $data->date_to = $this->date_to;

        if ($this->roll_image != '') {
            $roll_imageName = Carbon::now()->timestamp . '_roll_image.' . $this->roll_image->extension();
            $this->roll_image->storeAs('all', $roll_imageName);
            $data->image = $roll_imageName;
        }

        $data->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Data added successfully']);
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editData($id)
    {
        $this->data_id = $id;

        $data = AboutRollOfHonour::where('id', $id)->first();
        $this->roll_name = $data->name;
        $this->date_from = $data->date_from;
        $this->date_to = $data->date_to;
        $this->uploadedRollImage = $data->image;

        $this->dispatchBrowserEvent('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'roll_name' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
        ]);

        $data = AboutRollOfHonour::where('id', $this->data_id)->first();
        $data->name = $this->roll_name;
        $data->date_from = $this->date_from;
        $data->date_to = $this->date_to;
        $data->image = $this->uploadedRollImage;

        if ($this->roll_image != '') {
            $roll_imageName = Carbon::now()->timestamp . '_roll_image.' . $this->roll_image->extension();
            $this->roll_image->storeAs('all', $roll_imageName);
            $data->image = $roll_imageName;
        }

        $data->save();

        $this->resetInputs();


        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
    }

    public function resetInputs()
    {
        $this->roll_name = '';
        $this->date_from = '';
        $this->date_to = '';
        $this->roll_image = '';
        $this->uploadedRollImage = '';
        $this->data_id = '';
    }

    public function close()
    {
        $this->dispatchBrowserEvent('closeModal');
        $this->resetInputs();
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteData()
    {
        $link = AboutRollOfHonour::where('id', $this->delete_id)->first();
        $link->delete();

        $this->dispatchBrowserEvent('delete_success');

        $this->delete_id = '';
    }


    public function render()
    {
        $rolls = AboutRollOfHonour::paginate(10);

        return view('livewire.admin.aboutmenu.message-from-chairman-component', ['rolls' => $rolls])->layout('livewire.admin.layouts.base');
    }
}
