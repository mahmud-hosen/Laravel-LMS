<?php

namespace App\Http\Livewire\Frontend\Oncampus;

use App\Models\OnCampusGallery;
use App\Models\OnCampusGalleryImages;
use Livewire\Component;

class GalleryImagesComponent extends Component
{
    public $gallery_id, $gallery;

    public function mount($slug)
    {
        $gallery = OnCampusGallery::where('slug', $slug)->first();
        $this->gallery_id = $gallery->id;
        $this->gallery = $gallery;
    }

    public function render()
    {
        $images = OnCampusGalleryImages::where('gallery_id', $this->gallery_id)->get();

        return view('livewire.frontend.oncampus.gallery-images-component', ['images' => $images])->layout('livewire.frontend.layouts.base');
    }
}
