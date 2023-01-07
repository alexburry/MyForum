<div>
    {{-- {{dd(Auth::user());}} --}}
    @if(Auth::user() == null)
        <p> Please sign in to view likes </p>
    @else 
    <div class="inline-flex items-rigt text-sm">
        <button wire:click="like" class="inline-flex space-x-2  focus:outline-none focus:ring-0">
            <img
                src="{{ asset('images/like.png') }}"
                class="w-6 mb-8 shadow-xl"
                alt="">
        </button>
        <p class="text-xl">{{ $count }}</p>
    </div>
        
    @endif   
</div>
