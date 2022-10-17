<?php

namespace App\Http\Livewire\Admin\Homepage;

use App\Models\HomepageAchievement;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AchievementsComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $sortingValue, $searchTerm, $title, $description, $image, $uploadedImage, $data_id, $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function mount()
    {
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'description' => 'required',
        ]);
    }

    public function storeData()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $data = new HomepageAchievement();
        $data->title = $this->title;
        $data->description = $this->description;

        if ($this->image != '') {
            $imageName = Carbon::now()->timestamp . '_image.' . $this->image->extension();
            $this->image->storeAs('all', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        $this->resetInputs();
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('success', ['message' => 'Event added successfully']);
    }

    public function editData($id)
    {
        $this->data_id = $id;

        $data = HomepageAchievement::where('id', $id)->first();
        $this->title = $data->title;
        $this->description = $data->description;
        $this->uploadedImage = $data->image;

        $this->dispatchBrowserEvent('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = HomepageAchievement::where('id', $this->data_id)->first();
        $data->title = $this->title;
        $data->description = $this->description;
        $data->image = $this->uploadedImage;

        if ($this->image != '') {
            $imageName = Carbon::now()->timestamp . '_image.' . $this->image->extension();
            $this->image->storeAs('all', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        $this->dispatchBrowserEvent('closeModal');
        $this->resetInputs();

        $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
    }

    public function resetInputs()
    {
        $this->title = '';
        $this->description = '';
        $this->image = '';
        $this->uploadedImage = '';
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
        $link = HomepageAchievement::where('id', $this->delete_id)->first();
        $link->delete();

        $this->dispatchBrowserEvent('delete_success');

        $this->delete_id = '';
    }

    public function render()
    {
        $achievements = HomepageAchievement::where('title', 'like', '%' . $this->searchTerm . '%')->paginate($this->sortingValue);

        return view('livewire.admin.homepage.achievements-component',['achievements'=>$achievements])->layout('livewire.admin.layouts.base');
    }
}
