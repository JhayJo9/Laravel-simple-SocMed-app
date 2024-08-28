<x-layout>
    <div class="card w-9/12">
        <h2 class="text-blue-300 text-lg">Dashboard</h2>
        @if (session('Success'))
            <div>
                <p>{{ session('Success') }}</p>
            </div>
           @elseif (session('delete'))
           <div>
            <p>{{ session('delete') }}</p>
        </div>
        @endif
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
                @error('title')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
               
                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="body" id="body"  rows="6"></textarea>
                @error('body')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
            @error('image')
                     <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Post it</button>
        </form>
    </div>
    
    <div class="mt-3 w-9/6">
        <p class="text-blue-300 text-lg">Your Latest Post</p>

        <div class="flex flex-col">
            @foreach ($posts as $post)
            <div class="card mt-3">
                <div class="h-auto w-2/2 rounded-md overflow-hidden justify-center align-middle">
                    @if ($post->image)
                        <img class="shadow-xl dark:shadow-gray-800" src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
                    @else
                        <img class="object-cover object-center rounded-md" src="{{ asset('storage/posts_images/a.png') }}" alt="Default Image">
                    @endif
                </div>

                 <h3 class="font-bold text-xl">{{ $post->title }}</h3>       
                 <div class="text-xs font-light mb-4">
                 <span>POSTED {{ $post->created_at->diffForHumans() }} by </span>
                 <a href="" class="text-blue-300">{{ $post->user->username }}</a>
                 </div>
                 
                 <div class="text-sm">
                    <p>{{ Str::words($post->body, 15, '...') }}</p>
                 </div>

                 <div class="flex items-center justify-end gap-4 mt-6">
                    <a href="{{ route('posts.edit', $post ) }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-red-300 font-small rounded-md text-sm px-3 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Update</a>
                    <form action="{{ route('posts.destroy', $post ) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-small rounded-md text-sm px-3 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                    </form>
                 </div>
            </div>
             @endforeach

    </div>

    <div>
        {{ $posts->links() }}
    </div>
</x-layout>