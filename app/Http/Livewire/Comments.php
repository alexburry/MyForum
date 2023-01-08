<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class Comments extends Component
{
    use WithPagination;

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

    public function deleteComment(Comment $comment)
    {
        $comment->delete();        
    }

    public function render()
    {
        $paginated_comments = Comment::where('post_id', '=', $this->post->id)->paginate(7);
        $this->comments = collect($paginated_comments->items());

        return view('livewire.comments', [
            'post' => $this->post,
            'paginated_comments' => $paginated_comments,
        ]);
    }
}
