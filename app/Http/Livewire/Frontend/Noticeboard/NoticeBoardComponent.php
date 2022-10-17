<?php

namespace App\Http\Livewire\Frontend\Noticeboard;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithPagination;

class NoticeBoardComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $notices = Notice::where('status', 1)->paginate(10);

        return view('livewire.frontend.noticeboard.notice-board-component', ['notices' => $notices])->layout('livewire.frontend.layouts.base');
    }
}
