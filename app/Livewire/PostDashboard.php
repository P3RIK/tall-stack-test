<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostDashboard extends Component
{

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
        return view('livewire.post-dashboard')->with([
            'posts' => Post::all()
        ]);
    }
}
