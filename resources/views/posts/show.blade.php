@extends('layouts.app')
@section('title', 'test')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <h1 class="text-4xl font-bold text-gray-800"> {{ $post->title}} </h1>       
        <h3> 
            Posted by: <a href="{{ route('profile.show', ['user'=>$post->user]) }}">{{$post->user->name}}</a>
        </h3>
        <p class="text-2xl font-semibold text-gray-600">{{$post->content}}</p>
    </div>

    @if ($post->user_id == Auth::id())
        <a href="{{ route('posts.edit', ['subforum'=>$subforum, 'post'=>$post]) }}"> <button class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded">Edit post</button></a>
    @endif

    <a href="{{ route('comments.create', ['subforum'=>$subforum, 'post'=>$post]) }}"> <button class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded">Add Comment</button> </a>
    
    {{-- Comments --}}
    <div>
        @foreach($post->comments as $comment)
        <div class="bg-gray-100 rounded-lg p-4 mb-4">
            <p class="text-gray-800 text-base">{{ $comment->content }}</p>
            <p class = "text-sm font-light text-gray-600">
                <a href="{{ route('profile.show', ['user'=>$comment->user]) }}">
                    Posted by: {{ $comment->user->name }}
                </a>
            </p>

            @if ($comment->user_id == Auth::id())
            <div class="w-1/2 flex justify-start">
                <a href="{{ route('comments.edit', ['subforum'=>$subforum, 'post'=>$post, 'comment'=>$comment]) }}"> 
                    <button class="bg-zinc-500 hover:bg-zinc-700 text-white text-sm py-1 px-1 rounded float-left">
                        Edit Comment
                    </button> 
                </a>

                <form method="POST"
                action="{{ route('comments.destroy', ['subforum'=> $subforum, 'post'=>$post, 'comment'=>$comment]) }}">
                    @csrf 
                    @method('DELETE')
                    <button class="bg-zinc-500 hover:bg-zinc-700 text-white text-sm py-1 px-1 rounded float-left" type="submit">Delete</button>
                </form>
            </div>  
            @endif
        </div>
        @endforeach
    </div>
    
    <a href="{{ route('subforums.show', ['subforum' => $subforum]) }}"> <button class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded">Go Back</button> </a>

    @if ($post->user_id == Auth::id())
        <form method="POST"
            action="{{ route('subforum.posts.destroy', ['subforum'=>$subforum, 'post'=>$post]) }}">
            @csrf 
            @method('DELETE')
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete</button>
        </form>
    @endif

    @if(auth()->check() && auth()->user()->hasRole('mod'))
    <form method="POST"
        action="{{ route('subforum.posts.destroy', ['subforum'=>$subforum, 'post'=>$post]) }}">
        @csrf 
        @method('DELETE')
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Mod Delete</button>
    </form>
    @endif

</div>
@endsection

    