@props(['post', 'full' => false])

<div class="card">
    <div class="flex gap-6">
        <div class="h-auto w-1/5 rounded-md overflow-hidden self-start">
            @if ($post->image)
                <img class="shadow-xl dark:shadow-gray-800" src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
            @else
                <img class="object-cover object-center rounded-md" src="{{ asset('storage/posts_images/a.png') }}" alt="Default Image">
            @endif
        </div>
        
       
        <div class="w-4/5">
            {{-- Title --}}
            <h2 class="font-bold text-xl">{{ $post->title }}</h2>

            {{-- Author and Date --}}
            <div class="text-xs font-light mb-4">
                <span>Posted {{ $post->created_at->diffForHumans() }} by </span>
                <a href="{{ route('posts.user') }}" class="text-blue-500 font-medium">{{ $post->user->username }}</a>

            </div>
            
            {{-- Body --}}
            @if ($full)
                {{-- Show full body text in single post page --}}
                <div class="text-sm">
                    <span>{{ $post->body }}</span>
                </div>
            @else
                {{-- Show limited body text in single post page --}}
                <div class="text-sm">
                    <span>{{ Str::words($post->body, 15) }}</span>
                    <a href="{{ route('posts.show', $post) }}" class="text-blue-500 ml-2">Read more &rarr;</a>
                </div>
            @endif

            <div class="flex items-center justify-end gap-4 mt-6">
                {{ $slot }}
            </div>
           
        </div>

    </div>


    
    <div>
        {{ $slot }}
    </div>
</div>