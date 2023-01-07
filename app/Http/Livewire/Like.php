<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostLike;

class Like extends Component
{
    public Post $post;
    public $count;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->count = $this->post->likes->count();
    }

    public function like()
    {
        if($this->notLiked()){
            $like = new PostLike;
            $like->user_id = auth()->user()->id;
            $like->post_id = $this->post->id;
            $like->save();

            $this->count++;           
        }
           
    }

    public function notLiked() 
    {
        $userLikes = auth()->user()->likes;
        foreach($userLikes as $userLike) {
            if ($userLike->post_id == $this->post->id) {
                $userLike->delete();
                $this->count--;
                return False;
            }                              
        }      
        return True; 
    }

    public function render()
    {
        return view('livewire.like');
    }
}
