@extends('layouts.app')
    @section('title', 'edit')
    @section('content')
    <div>
        <form method="POST" action="{{ route('posts.update') }}" class="mt-6 space-y-6">
            @csrf
            <div>
                <x-input-label for="title" :value="__('Post Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"/>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="content" :value="__('Post Body')" />
                <x-text-input id="content" class="block mt-1 w-full" type="text" name="content" :value="old('content')"/>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>
            <div>
                {{-- <p>User: <input type="text" name="user_id"
                    value="{{ old('user_id') }}"></p> --}}
                {{-- <input type="hidden" name="user_id"
                    value="{{ Auth::id() }}"">
                <input type="hidden" name="subforum_id"
                    value="{{$subforum->id}}""> --}}
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
    @endsection