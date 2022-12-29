@extends('layouts.app')
@section('title', $subforum->name)

@section('content')
    <h2>{{ $subforum->name }}</h2>

    <div>
        <a href="{{ route('posts.create', ['subforum'=>$subforum]) }}">Create Post</a>
    </div>

    <div>
        @foreach($subforum->posts as $post)
            <div class="post">
                <a href="{{ route('subforum.posts.show', ['subforum' => $subforum, 'post' => $post]) }}">{{ $post->title }}</a>                   
            </div>
        @endforeach
    </div>

    <a href="{{ route('subforums.index') }}">Go Back</a>
@endsection