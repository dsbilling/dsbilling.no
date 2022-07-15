<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Like extends Component
{
    public Post $post;

    public int $count;

    public $user;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->count = $post->likes()->count();
        $this->user = auth()->check() ? auth()->user() : null;
    }

    public function like()
    {
        if ($this->post->hasLiked($this->user)) {
            $this->post->dislike($this->user);
            $this->count = $this->post->likes()->count();
        } else {
            $this->post->like($this->user);
            $this->count = $this->post->likes()->count();
        }
    }

    public function render()
    {
        return view('livewire.like');
    }
}
