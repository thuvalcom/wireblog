<?php

namespace App\Livewire;

use App\Models\Page;
use App\Models\User;
use Livewire\Component;
use App\Models\Back\Post;
use App\Models\Back\Category;
use Livewire\Attributes\Layout;

class SinglePage extends Component
{
    public $page;
    #[Layout('layouts.home')]
    public function render()
    {
        $pages = Page::all();
        $posts = Post::all();
        $categories = Category::all();
        $users = User::all();
        return view('livewire.single-page', compact('posts', 'categories', 'users', 'pages'));
    }

    public function mount($slug)
    {
        $this->page = Page::where('slug', $slug)->firstOrFail();
    }
}
