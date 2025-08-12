<!DOCTYPE html>
<html lang="en" class="box-border p-0 m-0" x-data="{ isDarkMode: $persist(true).as('darkMode') }"
    x-bind:data-theme="isDarkMode ? 'night' : 'winter'">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Cinema Gemilang' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="custom-scroll flex @container mx-auto font-poppins " x-cloak>
    <livewire:NavBar></livewire:NavBar>
    <div class=" h-dvh  "></div>

    {{ $slot }}


    @livewireScripts


</body>

</html>
