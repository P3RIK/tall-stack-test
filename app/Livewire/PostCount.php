<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostCount extends Component
{
    protected $listeners = ['postCreated' => '$refresh'];

    public function render()
    {
        $count = Post::where('user_id', auth()->id())->count();
        return view('livewire.post-count', ['count' => $count]);
    }
}
