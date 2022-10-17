<?php

namespace App\Http\Livewire\Admin\Publication;

use App\Models\PublicationYearlyMagazine;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MagazineComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $sortingValue, $searchTerm, $title, $description, $link, $image, $uploadedImage, $data_id, $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function mount()
    {
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);
    }

    public function storeData()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
            'image' => 'required',
        ]);

        $data = new PublicationYearlyMagazine();
        $data->title = $this->title;
        $data->description = $this->description;
        $data->link = $this->link;

        if ($this->image != '') {
            $imagetitle = Carbon::now()->timestamp . '_image.' . $this->image->extension();
            $this->image->storeAs('all', $imagetitle);
            $data->image = $imagetitle;
        }

        $data->save();

        $this->resetInputs();

        $this->dispatchBrowserEvent('success', ['message' => 'Data added successfully']);
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editData($id)
    {
        $this->data_id = $id;

        $data = PublicationYearlyMagazine::where('id', $id)->first();
        $this->title = $data->title;
        $this->description = $data->description;
        $this->link = $data->link;
        $this->uploadedImage = $data->image;

        $this->dispatchBrowserEvent('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);

        $data = PublicationYearlyMagazine::where('id', $this->data_id)->first();
        $data->title = $this->title;
        $data->description = $this->description;
        $data->link = $this->link;
        $data->image = $this->uploadedImage;
        if ($this->image != '') {
            $imagetitle = Carbon::now()->timestamp . '_image.' . $this->image->extension();
            $this->image->storeAs('all', $imagetitle);
            $data->image = $imagetitle;
        }

        $data->save();

        $this->resetInputs();

        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
    }

    public function resetInputs()
    {
        $this->title = '';
        $this->description = '';
        $this->link = '';
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
        $data = PublicationYearlyMagazine::where('id', $this->delete_id)->first();
        $data->delete();

        $this->delete_id = '';
        $this->dispatchBrowserEvent('delete_success');
    }

    public function render()
    {
        $magazines = PublicationYearlyMagazine::where('title', 'like', '%' . $this->searchTerm . '%')->orWhere('description', 'like', '%' . $this->searchTerm . '%')->paginate($this->sortingValue);

        return view('livewire.admin.publication.magazine-component', ['magazines' => $magazines])->layout('livewire.admin.layouts.base');
    }
}
