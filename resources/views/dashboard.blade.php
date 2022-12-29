@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <h2 >Dashboard</h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome to MyForum!") }}
                </div>
            </div>
        </div>
    </div>
@endsection

