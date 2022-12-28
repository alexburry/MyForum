<x-app-layout>
    @section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $subforum->name }}
        </h2>
    </x-slot>

    <div>
        <a href="{{ route('posts.create', ['subforum'=>$subforum]) }}">Create Post</a>"
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($subforum->posts as $post)
                    <div class="p-6 text-gray-900">
                        <a href="{{ route('subforum.posts.show', ['subforum' => $subforum, 'post' => $post]) }}">{{ $post->title }}</a>                   
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <a href="{{ route('subforums.index') }}">Go Back</a> --}}
    @endsection
</x-app-layout>