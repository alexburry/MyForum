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
        // dd($this->comments);
    }

    public function deleteComment(Comment $comment)
    {
        // foreach($this->comments as $key => $value ){
        //     if ($this)
        // }
        // dd($this->comments);
        $key = 0;
        foreach($this->comments as $value) {
            if ($value->id == $comment->id) {
                break;
            } else {
                $key=$key+1;
            }
        }
        // dd($key, $this->comments);
        
        //dd($keys);
        $this->comments->forget($key);

        $comment->delete();
        
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
