<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    {{-- <script src="https://unpkg.com/@tailwindcss/browser@4"></script> --}}
</head>

<body class="bg-zinc-100">
    <livewire:notification />
    {{ $slot }}
    @livewireScripts
</body>

</html>
