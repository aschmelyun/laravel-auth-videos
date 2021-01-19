<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Arr;
use Livewire\Component;

class Posts extends Component
{
    public $posts;

    public $showPostModal = false;

    public $state = [
        'id' => null,
        'title' => '',
        'body' => '',
    ];

    public function render()
    {
        return view('livewire.posts');
    }

    public function savePost()
    {
        // save the new Post model
        // or update the existing Post model with new state data
        if ($this->state['id']) {
            $post = Post::find($this->state['id'])
                ->update(Arr::only($this->state, ['title', 'body']));
        } else {
            $post = Post::create($this->state);
        }

        if ($post) {
            $this->posts = Post::all();
            $this->resetState();
        }
    }

    public function editPost(Post $post)
    {
        $this->state = [
            'id' => $post->id,
            'title' => $post->title,
            'body' => $post->body,
        ];
        $this->showPostModal = true;
    }

    public function resetState()
    {
        $this->showPostModal = false;
        $this->state = [
            'id' => null,
            'title' => '',
            'body' => '',
        ];
    }
}
