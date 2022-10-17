<?php

namespace App\Http\Livewire\Frontend;

use App\Models\HomepageAchievement;
use App\Models\HomepageEvent;
use App\Models\HomepageFacilities;
use App\Models\HomepageMembers;
use App\Models\HomepageTopSection;
use App\Models\Notice;
use Livewire\Component;

class HomeComponent extends Component
{
    public $topSection, $events, $member, $facilities, $achievements, $featuredNotices, $notices;

    public function render()
    {
        $this->topSection = HomepageTopSection::where('id', 1)->first();
        $this->member = HomepageMembers::where('id', 1)->first();
        $this->events = HomepageEvent::get();
        $this->facilities = HomepageFacilities::get();
        $this->achievements = HomepageAchievement::get();

        
        $this->notices = Notice::where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();
        $this->featuredNotices = Notice::where('status', 1)->where('featured', 1)->orderBy('id', 'DESC')->get();

        return view('livewire.frontend.home-component',)->layout('livewire.frontend.layouts.base');
    }
}
