<?php

namespace App\Livewire;

use App\Models\Back\Category;
use Livewire\Component;

class Navbar extends Component
{

    public function render()
    {
        $categories = Category::take(4)->get();
        return view('livewire.navbar', compact('categories'));
    }
}
