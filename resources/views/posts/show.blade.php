@extends('layouts.app')
@section('title', $post->title)

@section('content')
<div class="p-3 bg-sky-300 shadow rounded-lg space-y-4">

    {{-- Post content --}}
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <h1 class="text-4xl font-bold text-gray-800"> {{ $post->title}} </h1>       
        <h3> 
            Posted by: <a href="{{ route('profile.show', ['user'=>$post->user]) }}">{{$post->user->name}}</a>
        </h3>
        
        
        @if ($post->image()->exists())
            <img
                src="{{ asset('images/' . $post->image->image_path) }}"
                class="w-40 mb-8 shadow-xl"
                alt="">
        @endif

        <p class="text-2xl font-semibold text-gray-600">{{$post->content}}</p>

        @livewire('like', ['post' => $post])
    </div>

    <div>
    @if ($post->user_id == Auth::id())
        <a href="{{ route('posts.edit', ['subforum'=>$subforum, 'post'=>$post]) }}"> <button class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded">Edit post</button></a>
    @endif
    </div>

    @livewire('comments', ['post' => $post])
    
    <a href="{{ route('subforums.show', ['subforum' => $subforum]) }}"> <button class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded">Go Back</button> </a>

    @if ($post->user_id == Auth::id())
        <form method="POST"
            action="{{ route('subforum.posts.destroy', ['subforum'=>$subforum, 'post'=>$post]) }}">
            @csrf 
            @method('DELETE')
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete</button>
        </form>
    @endif

    @can('isMod')
    <form method="POST"
        action="{{ route('subforum.posts.destroy', ['subforum'=>$subforum, 'post'=>$post]) }}">
        @csrf 
        @method('DELETE')
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Mod Delete</button>
    </form>
    @endcan

</div>
@endsection

    