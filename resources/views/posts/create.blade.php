@extends('layouts.app')
    @section('content')
    <h1 class="text-4xl font-semibold text-gray-800">Make Post for {{ $subforum->name }}</h2>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
            <div>
                <p>Title: </p>
                <input type="text" class="bg-white focus:outline-none focus:shadow-outline border
                border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" 
                    name="title">                 
            </div>
            <div>
                <p>Content:</p> 
                <textarea type="text" class="bg-white focus:outline-none focus:shadow-outline border 
                    border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal"
                    name="content">
                </textarea>      
            </div>
            <div>
                <p>Image:</p>
                <input type="file" name="image" class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded">
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}"">
            <input type="hidden" name="subforum_id" value="{{$subforum->id}}"">
            <input class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Submit">
            </div>
        </form>
    </div>

    <a href="{{ route('subforums.show', ['subforum' => $subforum]) }}"> 
        <button class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded"> 
            Go Back 
        </button> 
    </a>
    @endsection