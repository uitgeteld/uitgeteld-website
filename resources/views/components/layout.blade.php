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
    @endphp

    <main class="{{ $header ? 'md:ml-38 flex-1 w-full mt-16 md:mt-0 p-8' : 'w-full' }}">
        {{ $slot }}
    </main>

    @php
    $footer = $footer ?? true;
    @endphp

    @if ($footer)
    <div class="fixed bottom-2 {{ $header ? 'md:left-38 left-0 right-0' : 'left-0 right-0' }} z-50">
        <x-footer />
    </div>
    @endif
</body>

</html>