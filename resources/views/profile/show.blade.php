@extends('layouts.app')
@section('title', 'Profile Page')
@section('content')
    <h1> {{ $user->name }} </h1>

    <h2>Posts</h2>
    @foreach($user->posts as $post)
    <div class="post">
        <a href="{{ route('subforum.posts.show', ['subforum' => $post->subforum_id, 'post' => $post]) }}">{{ $post->title }}</a>                   
    </div>
    @endforeach
    <h2>Comments</h2>
    @foreach($user->comments as $comment)
    <div class="comment">
        <p>{{ $comment->content }}</p>
        {{-- <a href="{{ route('subforum.posts.show', ['subforum' => $post->subforum_id, 'post' => $comment->post_id]) }}">{{ $comment->content }}</a>                    --}}
    </div>
    @endforeach
    {{-- {{ dd($user->posts); }} --}}
    
@endsection