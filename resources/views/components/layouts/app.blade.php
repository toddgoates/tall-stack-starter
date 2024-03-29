<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        @vite('resources/css/app.css')
    </head>
    <body class="h-screen">
        <livewire:navbar />
        {{ $slot }}
    </body>
</html>
