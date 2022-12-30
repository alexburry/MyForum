@extends('layouts.app')
@section('title', 'test')

@section('content')
    <h2>
        <p>{{ $post->title}}</p>
        <p>Posted by: {{$post->user->name}}</p>
        <p>{{$post->content}}</p>
    </h2>

    <a href="{{ route('comments.create', ['subforum'=>$subforum, 'post'=>$post]) }}">Add Comment</a>
    
    <div>
        @foreach($post->comments as $comment)
        <div class="comment">
            <p>{{ $comment->content }}</p>
            <p>{{ $comment->user->name }}</p>
            <form method="POST"
                action="{{ route('comments.destroy', ['subforum'=> $subforum, 'post'=>$post, 'comment'=>$comment]) }}">
                @csrf 
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
        @endforeach
    </div>

    <a href="{{ route('subforums.show', ['subforum' => $subforum]) }}">Go Back</a>

    <form method="POST"
        action="{{ route('subforum.posts.destroy', ['subforum'=>$subforum, 'post'=>$post]) }}">
        @csrf 
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

@endsection

    