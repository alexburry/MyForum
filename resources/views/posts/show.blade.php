@extends('layouts.app')
@section('title', 'test')

@section('content')
    <h2>
        <p>{{ $post->title}}</p>
        <p>Posted by: {{$post->user->name}}</p>
        <p>{{$post->content}}</p>
    </h2>

    @if ($post->user_id == Auth::id())
        <a href="{{ route('posts.edit', ['subforum'=>$subforum, 'post'=>$post]) }}">edit post</a>
    @endif

    <a href="{{ route('comments.create', ['subforum'=>$subforum, 'post'=>$post]) }}">Add Comment</a>
    
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
            @endif
        </div>
        @endforeach
    </div>
    
    <a href="{{ route('subforums.show', ['subforum' => $subforum]) }}">Go Back</a>

    @if ($post->user_id == Auth::id())
        <form method="POST"
            action="{{ route('subforum.posts.destroy', ['subforum'=>$subforum, 'post'=>$post]) }}">
            @csrf 
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endif

@endsection

    