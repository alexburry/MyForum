@extends('layouts.app')
    @section('content')
    <h2>Make Post for {{ $subforum->name }}</h2>

    <div>
        <form method="POST" action="{{ route('posts.store') }}" class="mt-6 space-y-6">
            @csrf
            <div><p>Title: <input type="text" name="title" class="input-text-box-title"> </p></div>
            <div><p>Content: <textarea type="text" name="content" class="input-text-area-content"></textarea> </p></div>
            
            <input type="hidden" name="user_id" value="{{ Auth::id() }}"">
            <input type="hidden" name="subforum_id" value="{{$subforum->id}}"">
            <input type="submit" value="Submit">
            </div>
        </form>
    </div>

    <a href="{{ route('subforums.show', ['subforum' => $subforum]) }}"> <button> Go Back </button> </a>
    @endsection