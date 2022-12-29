@extends('layouts.app')
@section('title', 'test')

    @section('content')
        <h2>
            <p>{{ $post->title}}</p>
            <p>Posted by: {{$post->user->name}}</p>
            <p>{{$post->content}}</p>
        </h2>

    
    {{-- {{ dd($post)}} --}}
    <a href="{{ route('comments.create', ['subforum'=>$subforum, 'post'=>$post]) }}">Add Comment</a>
        <div>
            @foreach($post->comments as $comment)
            <div class="comment">
                <p>{{ $comment->content }}</p>
                <p>{{ $comment->user->name }}</p>
            </div>
            @endforeach
        </div>
    <a href="{{ route('subforums.show', ['subforum' => $subforum]) }}">Go Back</a>
    @endsection

    