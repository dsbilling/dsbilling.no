<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Like extends Component
{
    public Post $post;
    public int $count;
    public User|null $user = null;

    public function mount(Post $post): void
    {
        $this->post = $post;
        $this->count = $post->likes()->count();
        $this->user = auth()->check() ? auth()->user() : null;
    }

    public function like(): void
    {
        if ($this->post->hasLiked($this->user)) {
            $this->post->dislike($this->user);
        } else {
            $this->post->like($this->user);
        }
        $this->count = $this->post->likes()->count();
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.like');
    }
}
