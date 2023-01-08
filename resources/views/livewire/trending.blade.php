<div class="p-3 bg-sky-300 shadow rounded-lg space-y-4">
    <h1 class="text-3xl font-bold text-gray-800">Trending posts</h1>
    @foreach($paginated_posts as $post)
    
        <div class="static p-4 sm:p-8 bg-white shadow sm:rounded-lg"> 
            <a href="{{ route('subforum.posts.show', ['subforum' => $post->subforum, 'post' => $post]) }}">
                <div class="text-lg font-bold text-blue-900">
                    {{ $post->title }}
                    
                </div>
            </a>           
            <div class="text-lg font-semibold text-gray-600">
                Posted by: {{ $post->user->name }}
            </div> 
            
            <div class="text-sm font-semibold text-gray-600">
                <a href="{{ route('subforums.show', ['subforum' => $post->subforum]) }}">
                Posted in: {{ $post->subforum->name }}
                </a>
            </div> 
            @livewire('like', ['post' => $post])                                  
        </div>
               
     @endforeach
     
     {{ $paginated_posts->links() }}
</div>
