@extends('layouts.app')
@section('title', 'Subforums')
 
@section('content')    

    <div class="p-3 bg-sky-300 shadow rounded-lg space-y-4">
        <h1 class="text-4xl font-bold text-gray-800"> Subforums </h1>    
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
