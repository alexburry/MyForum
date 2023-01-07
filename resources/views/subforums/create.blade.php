@extends('layouts.app')
@section('title', 'Make New Subforum')
@section('content')
    <h1 class="text-4xl font-semibold text-gray-800">Make new subforum</h2>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form method="POST" action="{{ route('subforums.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
            <div>
                <p>Name: </p>
                <input type="text" class="bg-white focus:outline-none focus:shadow-outline border
                border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" 
                    name="name">                 
            </div>
            <div>
                <p>About: </p>
                <input type="text" class="bg-white focus:outline-none focus:shadow-outline border
                border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" 
                    name="about">                 
            </div>
            <input class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Submit">
        </form>
    </div>

    <a href="{{ route('subforums.index') }}"> 
        <button class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded"> 
            Go Back 
        </button> 
    </a>
@endsection