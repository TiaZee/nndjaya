<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/d508f9c7b5.js" crossorigin="anonymous"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            @include('layouts.navigation')

            <div class="w-full" id="content">
                <div class="flex">

                    <!-- Page Heading -->
                    @isset($header)
                        <header class="bg-white shadow flex justify-start items-center w-full p-4">
                            <button id="toggleSidebar" class="p-2 text-black">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                </svg>
                            </button>
                            <div>
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

                </div>

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
