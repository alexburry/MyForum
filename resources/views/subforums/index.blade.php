<x-app-layout>
    @section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subforums') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($subforums as $subforum)
                    <div class="p-6 text-gray-900">
                        {{ $subforum->name }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>