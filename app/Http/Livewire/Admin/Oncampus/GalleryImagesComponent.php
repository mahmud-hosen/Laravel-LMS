<?php

namespace App\Http\Livewire\Admin\Oncampus;

use App\Models\OnCampusGalleryImages;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class GalleryImagesComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $sortingValue, $searchTerm, $name, $image, $uploadedImage, $data_id, $delete_id, $gallery_id;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function mount($id)
    {
        $this->gallery_id = $id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
        ]);
    }

    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        $data = new OnCampusGalleryImages();
        $data->title = $this->name;
        $data->gallery_id = $this->gallery_id;

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

        $data = OnCampusGalleryImages::where('id', $id)->first();
        $this->name = $data->title;
        $this->uploadedImage = $data->image;

        $this->dispatchBrowserEvent('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $data = OnCampusGalleryImages::where('id', $this->data_id)->first();
        $data->title = $this->name;
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
        $this->name = '';
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
        $link = OnCampusGalleryImages::where('id', $this->delete_id)->first();
        $link->delete();

        $this->delete_id = '';
        $this->dispatchBrowserEvent('delete_success');
    }

    public function render()
    {
        $images = OnCampusGalleryImages::where('gallery_id', $this->gallery_id)->where('title', 'like', '%' . $this->searchTerm . '%')->paginate($this->sortingValue);

        return view('livewire.admin.oncampus.gallery-images-component', ['images' => $images])->layout('livewire.admin.layouts.base');
    }
}
