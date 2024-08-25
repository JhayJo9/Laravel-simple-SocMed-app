<x-layout>

   <div class="flex flex-col">
    @foreach ($posts as $post)
    <div class="card mt-3">
         <h3 class="font-bold text-xl">{{ $post->title }}</h3>

         <div class="text-xs font-light mb-4">
         <span>POSTED {{ $post->created_at->diffForHumans() }} by </span>
         <a href="" class="text-blue-300">{{ $post->user->username }}</a>
         </div>

         <div class="text-sm">
            <p>{{ Str::words($post->body, 15, '...') }}</p>
         </div>
    </div>
     @endforeach

     <div>
      {{ $posts->links() }}
      </div>
   </div>
</x-layout>