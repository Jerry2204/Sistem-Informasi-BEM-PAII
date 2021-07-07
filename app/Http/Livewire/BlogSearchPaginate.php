<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class BlogSearchPaginate extends Component
{
    use WithPagination;

    public $query;

    public function mount()
    {
        $this->reset(['query']);
    }

    public function resetFilters()
    {
        $this->query = "";
    }

    public function render()
    {
        return view('livewire.blog-search-paginate', [
            'posts' => Post::where('title', 'like', '%'.$this->query.'%')->orWhere('content', 'like', '%'.$this->query.'%')->paginate(9),
        ]);
    }
}
