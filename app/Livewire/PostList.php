<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;
    #[Url()]
    public $sort = 'desc';
    #[Url()]
    public $search = '';
    #[Url()]
    public $category = '';
    #[Url()]
    public $year = '';
    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }
    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }
    public function updateYear($year)
    {
        $this->year = $year;
        $this->resetPage();
    }
    public function clearFilters()
    {
        $this->search = '';
        $this->category = '';
        $this->year = '';
        $this->resetPage();
    }
    #[Computed()]
    public function posts()
    {
        return Post::published()
            ->orderBy('published_at', $this->sort)
            ->when($this->activeCategory, function ($query) {
                $query->withCategory($this->category);
            })
            ->when($this->year, function ($query) {
                $query->whereYear('published_at',$this->year)->first();
            })
            ->where('title', 'like', "%$this->search%")
            ->paginate(5);
    }
    #[Computed()]
    public function activeCategory()
    {
        return Category::where('category_slug', $this->category)->first();
    }
    public function render()
    {
        return view('livewire.post-list');
    }
}
