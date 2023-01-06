@extends('layouts.app')
@section('title', 'Subforums')
 
@section('content')    

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @foreach($subforums as $subforum)  
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <a href="{{ route('subforums.show', ['subforum' => $subforum]) }}">
                    <div class="text-lg font-bold text-blue-900">
                        {{ $subforum->name }}
                    </div>
                </a>
                <p>{{$subforum->about}}</p>
            </div>  
        @endforeach
    </div>
    
    
@endsection
