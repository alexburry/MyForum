@extends('layouts.app')
@section('title', $user->name)
@section('content')
<div class="p-3 bg-sky-300 shadow rounded-lg space-y-4">
    <h1 class="text-4xl font-bold text-gray-800"> {{ $user->name }} </h1>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <h2 class="text-3xl font-semibold text-gray-700">Posts</h2>
        @foreach($user->posts as $post)
        <div class="bg-gray-100 rounded-lg p-4 mb-4">
            <a href="{{ route('subforum.posts.show', ['subforum' => $post->subforum_id, 'post' => $post]) }}">
                <p class="text-blue-500 text-lg font-semibold">{{ $post->title }}
            </a>                   
        </div>
        @endforeach
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <h2 class="text-3xl font-semibold text-gray-700">Comments</h2>
        @foreach($user->comments as $comment)
        <div class="bg-gray-100 rounded-lg p-4 mb-4">
            <p>{{ $comment->content }}</p>
            {{-- <a href="{{ route('subforum.posts.show', ['subforum' => $post->subforum_id, 'post' => $comment->post_id]) }}">{{ $comment->content }}</a>                    --}}
        </div>
        @endforeach
    </div> 
</div> 
@endsection