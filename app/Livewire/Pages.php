<?php

namespace App\Livewire;

use App\Models\Page;
use Livewire\Component;
use Illuminate\Support\Str;

class Pages extends Component
{
    public $title;
    public $slug;
    public $content;
    public $updatedTitle;
    public $selected_id;
    public $updateMode = false;
    public $pageToDelete;
    public $confirmingDelete = false;
    public function render()
    {
        $pages = Page::all();
        return view('livewire.pages', compact('pages'));
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'content' => 'required',
        ]);
        $this->slug = Str::slug($this->title, '-');

        Page::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ]);

        $this->reset([
            'title',
            'slug',
            'content',
        ]);
        session()->flash('success', 'Page Successfully Created.');
        $this->redirect('/pages', navigate: true);
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $this->selected_id = $id;
        $this->title = $page->title;
        $this->slug = $page->slug;
        $this->content = $page->content;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $this->slug = Str::slug($this->title, '-');
        $page = Page::findOrFail($this->selected_id);

        $page->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ]);

        $this->updatedTitle();
        $this->updateMode = false;
        $this->reset();
        session()->flash('success', 'Page Updated successfully.');
        $this->redirect('/pages', navigate: true);
    }

    public function confirmDelete($id)
    {
        $this->selected_id = $id;
        $this->confirmingDelete = true;
        $this->pageToDelete = Page::find($id);
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        $this->confirmingDelete = false;
        session()->flash('success', 'Page Deleted successfully.');
        $this->redirect('/pages', navigate: true);
    }
}
