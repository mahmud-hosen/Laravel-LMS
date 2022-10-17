<?php

namespace App\Http\Livewire\Admin\Publication\Article;

use App\Models\PublicationArticle;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class AddPublicationArticleComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $sortingValue, $searchTerm, $title, $slug, $content, $news_link, $image, $uploadedImage, $data_id, $delete_id;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required|unique:publication_articles',
            'content' => 'required',
            // 'news_link' => 'required',
        ]);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function storeData()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:publication_articles',
            'content' => 'required',
            // 'news_link' => 'required',
        ]);

        $data = new PublicationArticle();
        $data->title = $this->title;
        $data->slug = $this->slug;
        $data->content = $this->content;
        $data->news_link = $this->news_link;
        $data->status = 1;

        $data->save();

        $this->resetInputs();

        return redirect()->route('admin.articles')->with('success', 'Article added successfully');
        $this->dispatchBrowserEvent('closeModal');
    }



    public function resetInputs()
    {
        $this->title = '';
        $this->slug = '';
        $this->content = '';
        $this->news_link = '';
    }


    public function render()
    {
        return view('livewire.admin.publication.article.add-publication-article-component')->layout('livewire.admin.layouts.base');
    }
}
