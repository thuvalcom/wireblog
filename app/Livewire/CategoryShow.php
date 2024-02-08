<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Back\Post;
use Livewire\WithPagination;
use App\Models\Back\Category;
use Livewire\Attributes\Layout;

class CategoryShow extends Component
{
    use WithPagination;
    public $category;
    public $post;
    public $category_id;
    #[Layout('layouts.home')]
    public function render()
    {

        $posts = Post::where('category_id', $this->category->id)->paginate(3);
        $users = User::all();
        $categories = Category::all();
        return view('livewire.category-show', compact('posts', 'categories', 'users'));
    }

    public function mount($slug)
    {
        $this->category = Category::where('slug', $slug)->firstOrFail();
    }
}
