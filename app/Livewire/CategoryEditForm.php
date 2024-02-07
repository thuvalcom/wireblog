<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Back\Category;

class CategoryEditForm extends Component
{

    public function render()
    {
        $categories = Category::all();
        return view('livewire.category-edit-form', compact('categories'));
    }
}
