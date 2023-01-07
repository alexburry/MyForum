@extends('layouts.app')
@section('title', 'Make New Subforum')
@section('content')
    <h1 class="text-4xl font-semibold text-gray-800">Make new subforum</h2>

    {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form method="POST" action="{{ route('subforums.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
            
        </form>
    </div> --}}

    <a href="{{ route('subforums.index') }}"> 
        <button class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded"> 
            Go Back 
        </button> 
    </a>
@endsection