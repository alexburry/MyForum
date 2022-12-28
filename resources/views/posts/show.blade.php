<x-app-layout>
    @section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p class = "font-bold text-x2 text-gray-800 leading-tight">
                {{ $post->title}}
            </p>
            <p>Posted by: {{$post->user->name}}</p>
            <p>{{$post->content}}</p>
        </h2>
    </x-slot>
    
  
    {{-- <a href="{{ route('comments.create', ['post'=>$post]) }}">Add Comment</a> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($post->comments as $comment)
                <div class = "p-6 text-gray-900">
                    <p>{{ $comment->content }}</p>
                    <p>{{ $comment->user->name }}</p>
                </div>
                @endforeach
            </div>
        </div>   
    </div>
    <a href="{{ route('subforums.show', ['subforum' => $subforum]) }}">Go Back</a>
    @endsection
</x-app-layout>

    