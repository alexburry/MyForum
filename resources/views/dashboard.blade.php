@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <div class="p-3 bg-sky-300 shadow rounded-lg space-y-4">
        <h1 class="text-4xl font-bold text-gray-800"> Dashboard </h1> 
    </div> 
   @livewire('trending')
@endsection

