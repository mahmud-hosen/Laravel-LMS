<?php

namespace App\Http\Livewire\Frontend\Publication;

use App\Models\PublicationArticle;
use Livewire\Component;

class ReadArticleComponent extends Component
{
    public $article;

    public function mount($slug)
    {
        $this->article = PublicationArticle::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.frontend.publication.read-article-component')->layout('livewire.frontend.layouts.base');
    }
}
