<?php

namespace App\Http\Livewire\Frontend\Inc;

use App\Models\SettingFooter;
use App\Models\SettingFooterLinks;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $footer = SettingFooter::where('id', 1)->first();
        $footerlinks = SettingFooterLinks::get();

        return view('livewire.frontend.inc.footer', ['footer'=>$footer, 'footerlinks'=>$footerlinks]);
    }
}
