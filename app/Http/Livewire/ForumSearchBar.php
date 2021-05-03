<?php

namespace App\Http\Livewire;

use App\Models\Forum;
use Livewire\Component;

class ForumSearchBar extends Component
{
    public $query;
    public $forum_search;

    public function updatedQuery()
    {
        $this->forum_search = Forum::where('question', 'like', '%' . $this->query . '%')
                ->get()
                ->toArray();
    }

    public function mount()
    {
        $this->reset(['query', 'forum_search']);
    }

    public function resetFilters()
    {
        $this->query = "";
    }

    public function render()
    {
        return view('livewire.forum-search-bar');
    }
}
