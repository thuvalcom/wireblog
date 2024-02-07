<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> @setting('metaTitle')</title>
        <meta name="description" content="@setting('metaDescription')">
        <meta name="keywords" content="@setting('metaKeywords')">
        <meta name="author" content="@setting('metaAuthor')">
        <!-- Include Tailwind CSS and Feather Icon CDN -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
        <script src="https://unpkg.com/feather-icons"></script>
        @vite('resources/css/app.css')
    </head>

    <body class="bg-gray-900 text-white">

        {{ $slot }}

    </body>
    <script>
        feather.replace()


        document.getElementById('showFormBtn').addEventListener('click', function() {
            var formContainer = document.getElementById('formContainer');
            if (formContainer.classList.contains('hidden')) {
                formContainer.classList.remove('hidden');
            } else {
                formContainer.classList.add('hidden');
            }
        });
    </script>

</html>
