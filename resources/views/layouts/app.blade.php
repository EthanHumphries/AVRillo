<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SDLT Calculator')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    <div class="mx-auto flex min-h-screen w-full max-w-5xl flex-col px-4 py-8 sm:px-6 lg:px-8">
        <header class="mb-8">
            <div class="flex items-center justify-between">
                <a href="{{ url('/') }}" class="text-sm font-semibold tracking-wide text-slate-700">
                    AVRillo
                </a>
            </div>
        </header>

        <main class="flex-1">
            @yield('content')
        </main>
    </div>
</body>
</html>
