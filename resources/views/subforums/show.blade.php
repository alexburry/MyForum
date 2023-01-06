@extends('layouts.app')
@section('title', $subforum->name)

@section('content')


<div class="p-3 bg-sky-300 shadow rounded-lg space-y-4">
    <h1 class="text-4xl font-bold text-gray-800">{{ $subforum->name }}</h1>
    <p class="text-2xl font-semibold text-gray-600">{{ $subforum->about }}</p>
    
    <div>
        <a href="{{ route('posts.create', ['subforum'=>$subforum]) }}">
            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold 
                text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
                active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition 
                ease-in-out duration-150">
                Create Post
            </button>
        </a>
    </div>
  

        @foreach($subforum->posts as $post)
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <a href="{{ route('subforum.posts.show', ['subforum' => $subforum, 'post' => $post]) }}">
                    <div class="text-lg font-bold text-blue-900">
                        {{ $post->title }}
                    </div>
                </a> 
                    <div class="text-lg font-semibold text-gray-600">
                        Posted by: {{ $post->user->name }}
                    </div>                               
            </div>
        @endforeach


    <div>
        <a href="{{ route('subforums.index') }}">
            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold 
            text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
            active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition 
            ease-in-out duration-150">
                Go Back
            </button>
        </a>
    </div>
</div>
@endsection