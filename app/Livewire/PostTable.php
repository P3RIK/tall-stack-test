<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostTable extends Component
{
    public $search = '';

    public function deletePost($postId)
    {
        $post = Post::find($postId);
        if ($post) {
            $post->delete();
            session()->flash('message', 'Post deleted successfully.');
        } else {
            session()->flash('error', 'Post not found.');
        }
    }

    public function render()
    {
        $posts = Post::query()
            ->where('user_id', auth()->id())
            ->with(['user', 'category'])
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhereHas('category', function ($q) {
                          $q->where('name', 'like', '%' . $this->search . '%');
                      });
            })
            ->get();

        return view('livewire.post-table')->with([
            'posts' => $posts
        ]);
    }
}
