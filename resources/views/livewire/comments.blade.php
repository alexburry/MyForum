<div>
    <div class="my-4 flex">
        <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="Say something nice." wire:model="newComment">
        <div class="py-2">
            <button class="p-2 bg-blue-500 w-20 rounded shadow text-white" wire:click="addComment">Comment</button>
        </div>
    </div>

    @foreach($comments as $comment)
    <div class="bg-gray-100 rounded-lg p-4 mb-4">
        <p class="text-gray-800 text-base">{{ $comment->content }}</p>
        <p class = "text-sm font-light text-gray-600">Posted by: {{ $comment->user->name }}</p>
    </div>
    @endforeach
</div>
