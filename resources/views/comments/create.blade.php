<x-app-layout>
    @section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Make Post for {{ $post->title }}
        </h2>
    </x-slot>

    <div>
        <form method="POST" action="{{ route('comments.store') }}" class="mt-6 space-y-6">
            @csrf
            <div>
                <x-input-label for="content" :value="__('Comment')" />
                <x-text-input id="content" class="block mt-1 w-full" type="text" name="content" :value="old('content')"/>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>
            <div>

                <input type="hidden" name="user_id"
                    value="{{ Auth::id() }}"">
                <input type="hidden" name="post_id"
                    value="{{$post->id}}"">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
    @endsection
</x-app-layout>