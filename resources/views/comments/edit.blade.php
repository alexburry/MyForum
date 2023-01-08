@extends('layouts.app')
@section('title', 'Edit Comment')
    @section('content')
    <h2>Edit comment for {{ $post->title }}</h2>

    <div class="p-3 bg-sky-300 shadow rounded-lg space-y-4">
        <form method="POST" action="{{ route('comments.update', ['comment'=>$comment]) }}" class="mt-6 space-y-6">
            @csrf
            <div><p>Content: </p>
                <textarea type="text" name="content" class="bg-white focus:outline-none focus:shadow-outline border
                border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal">{{ $post->content }} 
                </textarea>
            </div>
            <div>
                <input type="hidden" name="user_id"
                    value="{{ Auth::id() }}"">
                <input type="hidden" name="post_id"
                    value="{{$post->id}}"">
                <input type="hidden" name="subforum"
                    value="{{$post->subforum_id}}"">
                    <input class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Submit">
            </div>
        </form>
    </div>
    @endsection