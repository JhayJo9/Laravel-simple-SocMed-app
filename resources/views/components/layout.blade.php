<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_ENV')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900">
    <header class="bg-slate-800 shadow-lg">
      <nav class="flex items-center gap-2 h-20 justify-between px-5">
            <a href="#" class="nav-link text-slate-100 flex ">Home</a>
            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}" class="nav-link text-slate-100">Login</a>
                <a href="{{ route('register') }}" class="nav-link text-slate-100">Register</a>
            </div>
      </nav>
    </header>
    <main class="py-8 px-4 mx-auto max-w-screen-lg flex items-center">
        {{ $slot }}
    </main>
</body>
</html>