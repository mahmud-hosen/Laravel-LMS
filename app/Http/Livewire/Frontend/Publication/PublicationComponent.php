<?php

namespace App\Http\Livewire\Frontend\Publication;

use App\Models\PublicationArticle;
use App\Models\PublicationYearlyMagazine;
use Livewire\Component;

class PublicationComponent extends Component
{
    public function render()
    {
        $magazines = PublicationYearlyMagazine::orderBy('id', 'DESC')->get();
        $articles = PublicationArticle::orderBy('id', 'DESC')->get();

        return view('livewire.frontend.publication.publication-component', ['magazines'=>$magazines, 'articles'=>$articles])->layout('livewire.frontend.layouts.base');
    }
}
