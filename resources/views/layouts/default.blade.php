<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? 'Auto Recursive' }}</title>

        {{-- Tail Wind Styles --}}
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>

        @livewireStyles
    </head>
    <body class="container mx-auto mt-5">
        
        @include("layouts.nav.container", ["title" => $title])

         @yield("main")


        {{-- Tail Wind Scripts --}}


        @stack('scripts')

        @livewireScripts
    </body>
</html>