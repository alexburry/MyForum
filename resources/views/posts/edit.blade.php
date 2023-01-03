@extends('layouts.app')
    @section('title', 'Edit Post')
    @section('content')
    <div>
        <form method="POST" action="{{ route('posts.update', ['post'=>$post]) }}" class="mt-6 space-y-6">
            @csrf
            <div>
                <form method="POST" action="{{ route('posts.store') }}" class="mt-6 space-y-6">
                    @csrf
                    <div><p>Title: <input type="text" name="title" class="input-text-box-title" value="{{ $post->title }}"> </p></div>
                    <div><p>Content: <textarea type="text" name="content" class="input-text-area-content">{{ $post->content }} </textarea></p></div>
                    
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}"">
                    <input type="hidden" name="subforum_id" value="{{$subforum->id}}"">
                    <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </form>
    </div>
    @endsection