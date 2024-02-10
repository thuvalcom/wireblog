<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Back\Post;

class PopularPosts extends Component
{
    public $posts;
    public function render()
    {
        return view('livewire.popular-posts');
    }

    public function mount()
    {
        $this->posts = Post::orderBy('views', 'desc')->take(5)->get();
    }
}
