<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Back\Post;
use Livewire\WithPagination;
use App\Models\Back\Category;
use Livewire\Attributes\Layout;


class Home extends Component
{
    use WithPagination;
    #[Layout('layouts.home')]
    public function render()
    {
        $posts = Post::paginate(3);
        $categories = Category::all();
        $users = User::all();
        return view('livewire.home', compact('posts', 'categories', 'users'));
    }
}
