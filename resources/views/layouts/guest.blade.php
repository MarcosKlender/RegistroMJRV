<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!--
Diseñado y desarrollado por Marcos Carrasco.
https://www.linkedin.com/in/marcosklender/
-->

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

    <!-- Dark Mode Button -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center pt-0 pb-6 bg-gray-100 dark:bg-gray-900">
        <div style="width:200px;height:140ox;">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </div>

        <h1 class="my-5 text-4xl font-extrabold dark:text-white">ASISTENCIA MJRV</h1>

        <div
            class="w-full sm:max-w-md mt-0 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>

        <footer
            class="hidden md:inline fixed bottom-0 left-0 z-20 w-full px-6 py-2 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between dark:bg-gray-800 dark:border-gray-600">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 CNE SD. Todos los derechos
                reservados.</span>
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">v1.0.0</span>
        </footer>

    </div>
</body>

</html>
