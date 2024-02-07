<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @yield('title')
        <script src="https://unpkg.com/feather-icons"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap"
            rel="stylesheet">
        @stack('meta')
        @vite('resources/css/app.css')
    </head>

    <body class="font-family: 'Montserrat', sans-serif; bg-gray-100">
        <div class="bg-indigo-800" x-data="{ open: false }">
            <nav class="container mx-auto px-6 py-3">
                <div class="flex items-center justify-between">
                    <div>
                        <a class="text-2xl font-bold text-white" href="/">Logo</a>
                    </div>

                    <div :class="{ 'block': open, 'hidden': !open }"
                        class="absolute left-0 mt-20 w-full space-y-1 rounded-md bg-white p-4 text-black shadow-lg md:static md:mt-0 md:flex md:w-auto md:items-center md:justify-end md:space-y-0 md:bg-transparent md:p-0 md:text-white">

                        <div class="px-4">
                            <a class="block rounded-md px-3 py-1 text-gray-700 hover:bg-indigo-500 hover:text-white md:text-gray-300 md:hover:bg-indigo-700 md:hover:text-white"
                                href="#">Menu 1</a>
                        </div>
                        <div class="relative px-4" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="block rounded-md px-3 py-1 text-gray-700 hover:bg-indigo-500 hover:text-white md:text-gray-300 md:hover:bg-indigo-700 md:hover:text-white">
                                Dropdown
                            </button>
                            <div x-show="open" @click.away="open = false"
                                class="absolute left-0 z-10 mt-2 w-48 space-y-1 rounded-md bg-white py-2 text-black shadow-lg">
                                <a href="#"
                                    class="block rounded-md px-3 py-1 text-gray-700 hover:bg-indigo-500 hover:text-white">
                                    Submenu 1
                                </a>
                                <a href="#"
                                    class="block rounded-md px-3 py-1 text-gray-700 hover:bg-indigo-500 hover:text-white">
                                    Submenu 2
                                </a>
                            </div>
                        </div>
                        <div class="px-4">
                            <a class="block rounded-md px-3 py-1 text-gray-700 hover:bg-indigo-500 hover:text-white md:text-gray-300 md:hover:bg-indigo-700 md:hover:text-white"
                                href="#">Menu 2</a>
                        </div>

                        <!-- Tombol close -->
                        <div class="flex justify-end md:hidden">
                            <button @click="open = false" type="button"
                                class="text-black hover:text-gray-500 focus:text-gray-500 focus:outline-none">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="md:hidden">
                        <button @click="open = !open" type="button"
                            class="text-white hover:text-white focus:text-white focus:outline-none">
                            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                <path fill-rule="evenodd"
                                    d="M4 5a1 1 0 011-1h14a1 1 0 110 2H5a1 1 0 01-1-1zm1 6a1 1 0 100 2h14a1 1 0 100-2H5zm1 6a1 1 0 011-1h14a1 1 0 110 2H6a1 1 0 01-1-1z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </nav>
        </div>

        {{ $slot }}

        {{-- footer --}}
        <div class="mt-4">
            <footer class="bg-indigo-800 px-8 py-8 font-normal text-white">
                <div class="container mx-auto">
                    <div class="flex flex-wrap items-center justify-between">
                        <!-- Logo atau nama blog -->
                        <div>
                            <a href="#" class="font-bold hover:text-gray-300">Nama Blog</a>
                        </div>

                        <!-- Menu navigasi -->
                        <div class="mt-4 md:mt-0">
                            <nav class="flex space-x-4">
                                <a href="#"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-white">Beranda</a>
                                <a href="#"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-white">Tentang</a>
                                <a href="#"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-white">Kontak</a>
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

    </body>

</html>
