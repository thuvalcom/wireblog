<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @yield('title')
        <script src="https://unpkg.com/feather-icons"></script>
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap"
            rel="stylesheet">
        @stack('meta')
        {{-- @vite('resources/css/app.css') --}}
    </head>

    <body class="bg-gray-100">
        @livewire('navbar')

        {{ $slot }}

        {{-- footer --}}
        <div class="mt-4">
            <footer class="bg-indigo-800 px-8 py-8 font-normal text-white">
                <div class="container mx-auto">
                    <div class="flex flex-wrap items-center justify-center gap-4">

                        <!-- Menu navigasi -->
                        <div class="mt-4 md:mt-0">
                            <nav class="flex space-x-4">
                                <a wire:navigate href="/"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-white">Home</a>
                                <a wire:navigate href="/page/about"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-white">About</a>
                                <a wire:navigate href="/page/contact"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-white">Contact</a>
                                <!-- Tambahkan lebih banyak link jika perlu -->
                            </nav>
                        </div>
                    </div>

                    <!-- Hak cipta -->
                    <div class="mt-4 text-center">
                        <p class="text-gray-400">© 2024 @setting('metaTitle') Hak Cipta Dilindungi.</p>
                    </div>
                </div>
            </footer>
        </div>
        <script src="{{ asset('build/assets/app.js') }}"></script>

    </body>

</html>
