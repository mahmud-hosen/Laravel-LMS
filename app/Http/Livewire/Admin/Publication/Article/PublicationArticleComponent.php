<?php

namespace App\Http\Livewire\Admin\Publication\Article;

use App\Models\PublicationArticle;
use Livewire\Component;
use Livewire\WithPagination;

class PublicationArticleComponent extends Component
{
    use WithPagination;

    public $sortingValue, $searchTerm, $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteData()
    {
        $data = PublicationArticle::where('id', $this->delete_id)->first();
        $data->delete();

        $this->delete_id = '';
        $this->dispatchBrowserEvent('delete_success');
    }

    public function render()
    {
        $articles = PublicationArticle::where('title', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);

        return view('livewire.admin.publication.article.publication-article-component', ['articles' => $articles])->layout('livewire.admin.layouts.base');
    }
}
