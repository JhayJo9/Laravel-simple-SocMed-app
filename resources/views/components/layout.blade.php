<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_ENV')}}</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900">
    <header class="bg-slate-800 shadow-lg">
      <nav class="flex items-center gap-2 h-20 justify-between px-5">
            <a href="{{ route('post.index') }}" class="nav-link text-slate-100 flex ">Home</a>

            @auth
                <div x-data="{open: false}" class="relative grid place-items-center">
                    <button @click="open = !open" type="button" class="rounded-sm">
                        <img class="rounded-full w-10 h-10 " src="https://picsum.photos/200" alt="Preview">
                    </button>

                    <div x-show="open" @click.outside="open = false" class="bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden font-light flex-col justify-center">
                        <p class="username flex justify-center items-center">{{ auth()->user()->username }}</p>
                        <a href="{{ route('dashboard') }}" class="block hover:bg-slate-100 pl-4 pr-8 py-2 mb-1 justify-center items-center">Dashboard</a>
                        <form action="{{route('logout') }}" method="post">
                            @csrf

                            <button class="block hover:bg-slate-100 pl-4 pr-8 py-2 mb-1 justify-center items-center" type="submit">Log out</button>
                        </form>
                    </div>

                    
                </div>
            @endauth
            
        @guest
        <div class="flex items-center gap-4">
            <a href="{{ route('login') }}" class="nav-link text-slate-100">Login</a>
            <a href="{{ route('register') }}" class="nav-link text-slate-100">Register</a>
        </div>
        @endguest
      </nav>
    </header>
    <main class="py-8 px-4 mx-auto max-w-screen-lg flex items-center justify-center">
        {{ $slot }}
    </main>
</body>
</html>