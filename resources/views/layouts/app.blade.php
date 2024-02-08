<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
        <script src="https://unpkg.com/feather-icons"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">

        <title> @setting('metaTitle')</title>
        <meta name="description" content="@setting('metaDescription')">
        <meta name="keywords" content="@setting('metaKeywords')">
        <meta name="author" content="@setting('metaAuthor')">
        {{-- @vite('resources/css/app.css') --}}

    </head>

    <body class="h-full">
        <div class="flex bg-gray-200">
            <!-- Sidebar -->

            @livewire('sidebar-component')

            <!-- Content -->
            <div class="flex w-full flex-col overflow-y-hidden">
                <!-- Top bar -->
                @livewire('header-component')

                <!-- Content -->
                {{ $slot }}

                <!-- end content -->

            </div>
        </div>

        <script>
            feather.replace()
            var sidebar = document.getElementById('sidebar');
            var menuBtn = document.getElementById('menuBtn');

            menuBtn.addEventListener('click', function(event) {
                event.stopPropagation();
                if (sidebar.classList.contains('hidden')) {
                    sidebar.classList.remove('hidden');
                    sidebar.classList.add('block');
                } else {
                    sidebar.classList.remove('block');
                    sidebar.classList.add('hidden');
                }
            });

            window.addEventListener('click', function() {
                if (!sidebar.classList.contains('hidden')) {
                    sidebar.classList.remove('block');
                    sidebar.classList.add('hidden');
                }
            });
        </script>
        <script src="{{ asset('build/assets/app.js') }}"></script>
    </body>

</html>
