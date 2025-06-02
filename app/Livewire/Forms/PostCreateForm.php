<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PostCreateForm extends Component
{
    use WithFileUploads;

    public string $title;
    public string $content;
    public $image = null;
    public $category_id = null;
    public bool $is_published = false;
    public $showSuccessMessage = false;

    public function mount()
    {
        $this->title = '';
        $this->content = '';
    }

    public function createPost()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = auth()->user()->posts()->create([
            'title' => $this->title,
            'content' => $this->content,
            'is_published' => $this->is_published,
            'category_id' => $this->category_id,
            'author_id' => auth()->id(),
        ]);

        if ($this->image) {
            $path = $this->image->store('images', 'public');
            $post->update(['image_path' => $path]);
        }

        // Reset form fields
        $this->reset(['title', 'content', 'image', 'category_id', 'is_published']);
        $this->showSuccessMessage = true;

        // Notify other components (like the counter)
        $this->dispatch('postCreated');
    }

    public function render()
    {
        return view('livewire.post-create-form')->with([
            'categorien' => Category::all(),
        ]);
    }
}
