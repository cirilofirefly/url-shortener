<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app"></div>
    <footer class="absolute bottom-10">
        <div class="text-[3rem] flex items-center justify-center space-x-4 mb-10">
            <a href="https://laravel.com" target="_blank"><i class="fab fa-laravel"></i></a>
            <span class="text-xl">+</span>
            <a href="https://vuejs.org" target="_blank"><i class="fab fa-vuejs"></i></a>
        </div>
        Developed by <a class="underline text-blue-500" target="_blank"
            href="https://github.com/cirilofirefly">@cirilofirefly</a>
    </footer>
</body>

</html>