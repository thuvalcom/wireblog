<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Back\Post;
use Illuminate\Support\Str;
use App\Models\Back\Category;
use Livewire\WithFileUploads;
use Livewire\Attribute\layout;
use Livewire\WithPagination;


class PostComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $slug;
    public $content;
    public $image;
    public $category_id;
    public $status = 'published';
    public $description;
    public $tags;
    public $user_id = [];
    public $tagsArray = [];
    public $selected_id;
    public $updateMode = false;
    public $postToDelete;
    public $confirmingDelete = false;

    public function render()
    {
        $posts = Post::all();
        $categories = Category::all();
        $users = User::all();

        return view('livewire.post-component', compact('posts', 'categories', 'users'));
    }

    public function mount()
    {
        $this->user_id = auth()->id(); // Atau nilai default sesuai kebutuhan

    }


    public function save()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required',
            'status' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'user_id' => 'required|integer|exists:users,id',


        ]);
        $this->slug = Str::slug($this->title, '-');


        // Simpan gambar ke storage
        $imagePath = $this->image->store('article_images', 'public');

        // Simpan post ke database
        Post::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'image' => $imagePath,
            'category_id' => $this->category_id,
            'status' => $this->status,
            'description' => $this->description,
            'tags' => $this->tags,
            'user_id' => $this->user_id,
        ]);


        // Reset input setelah menyimpan
        $this->reset([
            'title',
            'content',
            'image',
            'category_id',
            'status',
            'description',
            'tags',
            'user_id',
            'slug'
        ]);
        session()->flash('success', 'Post Created successfully.');
        $this->redirect('/posts', navigate: true);
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updatedTags()
    {
        $this->tagsArray = explode(',', $this->tags);
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->selected_id = $id;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->content = $post->content;
        $this->image = $post->image;
        $this->category_id = $post->category_id;
        $this->status = $post->status;
        $this->description = $post->description;
        $this->tags = $post->tags;
        $this->user_id = $post->user_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'sometimes|image|max:2048',
            'category_id' => 'required',
            'description' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'user_id' => 'required|integer|exists:users,id',
        ]);
        $post = Post::findOrFail($this->selected_id);
        $imagePath = $this->image->store('article_images', 'public');
        $this->slug = Str::slug($this->title, '-');
        $post->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'image' => $imagePath,
            'category_id' => $this->category_id,
            'status' => $this->status,
            'description' => $this->description,
            'tags' => $this->tags,
            'user_id' => $this->user_id,
        ]);

        $this->updatedTitle();
        $this->updatedTags();
        $this->updateMode = false;
        $this->reset();
        session()->flash('success', 'Post Updated successfully.');
        $this->redirect('/posts', navigate: true);
    }

    public function confirmDelete($id)
    {
        $this->selected_id = $id;
        $this->confirmingDelete = true;
        $this->postToDelete = Post::find($id);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        $this->confirmingDelete = false;
        session()->flash('success', 'Post Deleted successfully.');
        $this->redirect('/posts', navigate: true);
    }
}
