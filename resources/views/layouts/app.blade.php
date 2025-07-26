<!DOCTYPE html>
<html lang="en" class="box-border p-0 m-0" x-data="{ isDarkMode: $persist(true).as('darkMode') }"
    x-bind:data-theme="isDarkMode ? 'night' : 'corporate'">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//unpkg.com/@alpinejs/persist/dist/cdn.min.js" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>{{ $title ?? 'Cinema Gemilang' }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="flex @container mx-auto font-poppins" x-cloak>
    <div class="bg-white h-dvh dark:bg-slate-800"></div>

    {{ $slot }}

    @livewireScripts
</body>

</html>
