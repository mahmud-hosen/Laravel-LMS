<?php

namespace App\Http\Livewire\Admin\Homepage;

use App\Models\HomepageTopSection;
use App\Models\Notice;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class BannerSectionComponent extends Component
{
    use WithFileUploads;

    public $title, $image, $uploadedImage, $text;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function mount()
    {
        $getDetails = HomepageTopSection::where('id', 1)->first();

        if ($getDetails != '') {
            $this->title = $getDetails->title;
            $this->uploadedImage = $getDetails->image;
            $this->text = $getDetails->text;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'image' => 'required_if:uploadedImage,null',
            'text' => 'required',
        ], [
            'image.required_if' => 'The image field is required',
        ]);
    }

    public function storeDetails()
    {
        $this->validate([
            'title' => 'required',
            'image' => 'required_if:uploadedImage,null',
            'text' => 'required',
        ], [
            'image.required_if' => 'The image field is required',
        ]);

        $getDetails = HomepageTopSection::where('id', 1)->first();

        if ($getDetails != '') {
            $details = $getDetails;
        } else {
            $details = new HomepageTopSection();
        }

        $details->title = $this->title;
        $details->text = $this->text;
        $details->image = $this->uploadedImage;
        if ($this->image != '') {
            $imageName = Carbon::now()->timestamp . '_image.' . $this->image->extension();
            $this->image->storeAs('all', $imageName);
            $details->image = $imageName;
        }
        $details->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Data updated successfully']);
    }

    public function makeFeatured($id)
    {
        $count = $notice = Notice::where('featured', 1)->get()->count();

        if ($count >= 5) {
            $this->dispatchBrowserEvent('error', ['message' => 'Can not add more than 5 item']);
        } else {
            $notice = Notice::where('id', $id)->first();
            if ($notice->featured == 0) {
                $notice->featured = 1;
                $notice->save();

                $this->dispatchBrowserEvent('success', ['message' => 'Notice added to featured']);
            } else {
                $this->dispatchBrowserEvent('warning', ['message' => 'Notice already added to featured']);
            }
        }
    }

    public function removeFeatured($id)
    {
        $notice = Notice::where('id', $id)->first();
        $notice->featured = 0;
        $notice->save();

        $this->dispatchBrowserEvent('error', ['message' => 'Notice removed from featured']);
    }

    public function render()
    {
        $allNotices = Notice::where('status', 1)->orderBy('id', 'DESC')->get();
        $featuredNotices = Notice::where('status', 1)->where('featured', 1)->orderBy('id', 'DESC')->get();

        return view('livewire.admin.homepage.banner-section-component', ['allNotices' => $allNotices, 'featuredNotices' => $featuredNotices])->layout('livewire.admin.layouts.base');
    }
}
