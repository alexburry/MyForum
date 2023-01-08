<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostLike;

class Trending extends Component
{
    public $trending_posts;
    // protected $listeners = ['likeChanged' => 'render'];
    
    public function order() {

    }

    public function render()
    {   
        $paginated_posts = Post::withCount('likes')->orderBY('likes_count', 'DESC')->paginate(4);
        $this->trending_posts = collect($paginated_posts->items());
        // dd($this->trending_posts);
        return view('livewire.trending', [
            'paginated_posts' => $paginated_posts,
        ]);
    }
}
