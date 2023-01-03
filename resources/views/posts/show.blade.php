@extends('layouts.app')
@section('title', 'test')

@section('content')
    <div class="post">
        <h1> {{ $post->title}} </h1>
        <h3> Posted by: {{$post->user->name}} </h3>
        <p>{{$post->content}}</p>
    </div>

    @if ($post->user_id == Auth::id())
        <a href="{{ route('posts.edit', ['subforum'=>$subforum, 'post'=>$post]) }}"> <button>Edit post</button></a>
    @endif

    <a href="{{ route('comments.create', ['subforum'=>$subforum, 'post'=>$post]) }}"> <button>Add Comment</button> </a>
    
    {{-- Comments --}}
    <div>
        @foreach($post->comments as $comment)
        <div class="comment">
            <p>{{ $comment->content }}</p>
            <p>{{ $comment->user->name }}</p>
            @if ($comment->user_id == Auth::id())
                <form method="POST"
                action="{{ route('comments.destroy', ['subforum'=> $subforum, 'post'=>$post, 'comment'=>$comment]) }}">
                    @csrf 
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <a href="{{ route('comments.edit', ['subforum'=>$subforum, 'post'=>$post, 'comment'=>$comment]) }}"> <button>Edit Comment</button> </a>
            @endif
        </div>
        @endforeach
    </div>
    
    <a href="{{ route('subforums.show', ['subforum' => $subforum]) }}"> <button>Go Back</button> </a>

    @if ($post->user_id == Auth::id())
        <form method="POST"
            action="{{ route('subforum.posts.destroy', ['subforum'=>$subforum, 'post'=>$post]) }}">
            @csrf 
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endif

@endsection

    