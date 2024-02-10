<?php

namespace App\Livewire;

use App\Models\Page;
use Livewire\Component;
use App\Models\Back\Category;

class Navbar extends Component
{

    public function render()
    {
        $pages = Page::take(1)->get();
        $categories = Category::take(8)->get();
        return view('livewire.navbar', compact('categories', 'pages'));
    }
}
