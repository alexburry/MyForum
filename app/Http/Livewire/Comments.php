<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class Comments extends Component
{
    public $post;
    public $comments;
    public $newComment;

    protected $rules = [
        'newComment' => 'required|max:1000',
    ];

    public function addComment()
    {
        $this->validate();

        $c = new Comment;
        $c->content = $this->newComment;
        $c->user_id = auth()->user()->id;
        $c->post_id = $this->post->id;
        $c->save();

        $this->comments->push($c);

        $this->newComment = "";
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
