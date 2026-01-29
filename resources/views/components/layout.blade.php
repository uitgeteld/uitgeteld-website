<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@php $title = $title ?? 'uitgeteld.xyz'; echo $title; @endphp </title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite('resources/css/app.css')
</head>

<body class="flex bg-slate-100">
    @php
    $header = $header ?? false;
    $overflow = $overflow ?? false;
    $footer = $footer ?? false;
    @endphp

    <main class="{{ $header ? 'md:ml-36 flex-1 w-full mt-16 md:mt-0 p-8' : 'w-full' }} {{ $overflow ? 'overflow-hidden h-screen' : '' }}">
        {{ $slot }}
    </main>

    @if ($footer)
    <div class="fixed bottom-2 {{ $header ? 'md:left-36 left-0 right-0' : 'left-0 right-0' }} z-50">
        <x-footer />
    </div>
    @endif
</body>

</html>