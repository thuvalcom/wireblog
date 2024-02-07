<?php

namespace App\Livewire;

use App\Models\Back\Category;
use Livewire\Component;


class CategoryComponent extends Component
{

    public $name;
    public $selected_id;
    public $updateMode = false;
    public $confirmingDelete = false;
    public $categoryToDelete;


    // public $slug = '';
    public function save()
    {
        $this->validate([
            'name' => 'required'

        ]);
        Category::create([
            'name' => $this->name
        ]);
        toastify()->success('Category created successfully!');
        session()->flash('success', 'Category created successfully.');
        $this->redirect('/categories', navigate: true);
    }
    public function render()
    {
        $categories = Category::all();

        return view('livewire.category-component', compact('categories'));
    }



    public function resetInput()
    {
        $this->name = null;
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $category->name;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $category = Category::findOrFail($this->selected_id);
        $category->update([
            'name' => $this->name,
        ]);

        $this->resetInput();
        $this->updateMode = false;
        session()->flash('success', 'Category successfully updated.');
        $this->redirect('/categories', navigate: true);
    }

    public function confirmDelete($id)
    {
        $this->selected_id = $id;
        $this->confirmingDelete = true;
        $this->categoryToDelete = Category::find($id);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $this->confirmingDelete = false;
        session()->flash('success', 'Category successfully deleted.');
        $this->redirect('/categories', navigate: true);
    }
}
