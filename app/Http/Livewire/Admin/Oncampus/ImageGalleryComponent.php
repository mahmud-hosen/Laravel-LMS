<?php

namespace App\Http\Livewire\Admin\Oncampus;

use App\Models\OnCampusGallery;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ImageGalleryComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $sortingValue, $searchTerm, $title, $slug, $description, $image, $uploadedImage, $data_id, $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function mount()
    {
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);
    }

    public function storeData()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $data = new OnCampusGallery();
        $data->title = $this->title;
        $data->slug = $this->slug;
        $data->description = $this->description;

        if ($this->image != '') {
            $imageName = Carbon::now()->timestamp . '_image.' . $this->image->extension();
            $this->image->storeAs('all', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        $this->resetInputs();

        $this->dispatchBrowserEvent('success', ['message' => 'Data added successfully']);
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editData($id)
    {
        $this->data_id = $id;

        $data = OnCampusGallery::where('id', $id)->first();
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->description = $data->description;
        $this->uploadedImage = $data->image;

        $this->dispatchBrowserEvent('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $data = OnCampusGallery::where('id', $this->data_id)->first();
        $data->title = $this->title;
        $data->slug = $this->slug;
        $data->description = $this->description;
        $data->image = $this->uploadedImage;
        if ($this->image != '') {
            $imageName = Carbon::now()->timestamp . '_image.' . $this->image->extension();
            $this->image->storeAs('all', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        $this->resetInputs();

        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
    }

    public function resetInputs()
    {
        $this->title = '';
        $this->slug = '';
        $this->description = '';
        $this->image = '';
        $this->uploadedImage = '';
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
        $data = OnCampusGallery::where('id', $this->delete_id)->first();
        $data->delete();

        $this->delete_id = '';
        $this->dispatchBrowserEvent('delete_success');
    }

    public function render()
    {
        $galleries = OnCampusGallery::where('title', 'like', '%' . $this->searchTerm . '%')->paginate($this->sortingValue);

        return view('livewire.admin.oncampus.image-gallery-component', ['galleries' => $galleries])->layout('livewire.admin.layouts.base');
    }
}
