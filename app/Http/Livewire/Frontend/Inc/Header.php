<?php

namespace App\Http\Livewire\Frontend\Inc;

use App\Models\Notice;
use App\Models\SettingFooter;
use App\Models\SettingHeader;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $header = SettingHeader::where('id', 1)->first();
        $footer = SettingFooter::where('id', 1)->first();

        $notices = Notice::where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();

        return view('livewire.frontend.inc.header', ['footer' => $footer, 'header' => $header, 'notices'=>$notices]);
    }
}
