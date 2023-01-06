@extends('layouts.app')
    @section('title', 'Edit Post')
    @section('content')
    <div class="p-3 bg-sky-300 shadow rounded-lg space-y-4">
        <form method="POST" action="{{ route('posts.update', ['post'=>$post]) }}" class="mt-6 space-y-6">
            @csrf
            <div>
                <form method="POST" action="{{ route('posts.store') }}" class="mt-6 space-y-6">
                    @csrf
                    <div>
                        <p>Title:</p>
                            <input type="text" name="title" class="bg-white focus:outline-none focus:shadow-outline border
                            border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" value="{{ $post->title }}"> 
                    </div>
                    <div><p>Content: </p>
                        <textarea type="text" name="content" class="bg-white focus:outline-none focus:shadow-outline border
                        border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal">{{ $post->content }} 
                        </textarea>
                    </div>
                    
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}"">
                    <input type="hidden" name="subforum_id" value="{{$subforum->id}}"">
                    <input class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </form>
    </div>
    @endsection