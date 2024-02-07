<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Back\Post;
use App\Models\Back\Category;
use Livewire\Attributes\Layout;

class SinglePost extends Component
{
    public $post;
    #[Layout('layouts.home')]
    public function render()
    {
        $posts = Post::all();
        $categories = Category::all();
        $users = User::all();
        return view('livewire.single-post', compact('posts', 'categories', 'users'));
    }

    public function mount($slug)
    {
        $this->post = Post::where('slug', $slug)->firstOrFail();
    }
}
