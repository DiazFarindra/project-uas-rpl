<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans antialiased">
    <div class="min-h-full">
        @include('includes.navbar')

        <header class="bg-white shadow">
            <!-- component -->
            <div class="w-full h-full">
                    <div class="flex flex-no-wrap">
                        @include('includes.sidebar')

                        @yield('content')

                        @include('includes.notification')
                    </div>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
                <!-- Your content -->
                <div class="text-center font-bold font-sans">
                    Kelompok 11 Rekayasa Perangkat Lunak TI08
                </div>
            </div>
        </main>
    </div>
</body>
</html>
