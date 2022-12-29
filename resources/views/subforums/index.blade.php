@extends('layouts.app')
@section('title', 'Subforums')
 
@section('content')    
    <div>
        @foreach($subforums as $subforum)
            <div class="forum">
               <a href="{{ route('subforums.show', ['subforum' => $subforum]) }}">{{ $subforum->name }}</a>
            </div>
        @endforeach
    </div>
    
@endsection
