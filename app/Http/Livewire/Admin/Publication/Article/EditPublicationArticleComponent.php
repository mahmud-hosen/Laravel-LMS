<?php

namespace App\Http\Livewire\Admin\Publication\Article;

use App\Models\PublicationArticle;
use Livewire\Component;
use Illuminate\Support\Str;

class EditPublicationArticleComponent extends Component
{

    public $title, $slug, $content, $news_link, $image, $uploadedImage, $data_id;

    public function mount($id)
    {
        $data = PublicationArticle::where('id', $id)->first();

        $this->data_id = $data->id;
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->news_link = $data->news_link;
        $this->content = $data->content;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required|unique:publication_articles,slug,'.$this->data_id.'',
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
            'slug' => 'required|unique:publication_articles,slug,'.$this->data_id.'',
            'content' => 'required',
            // 'news_link' => 'required',
        ]);

        $data = PublicationArticle::where('id', $this->data_id)->first();
        $data->title = $this->title;
        $data->slug = $this->slug;
        $data->content = $this->content;
        $data->news_link = $this->news_link;
        $data->status = 1;

        $data->save();


        return redirect()->route('admin.articles')->with('success', 'Article updated successfully');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        return view('livewire.admin.publication.article.edit-publication-article-component')->layout('livewire.admin.layouts.base');
    }
}
