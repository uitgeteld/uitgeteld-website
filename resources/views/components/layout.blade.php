<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="flex">

    @php
    $header = $header ?? false;
    @endphp

    <main class="{{ $header ? 'ml-38 flex-1' : 'w-full' }} bg-slate-100">
        {{ $slot }}
    </main>

    @php
    $footer = $footer ?? true;
    @endphp

    @if ($footer)
    <div class="fixed bottom-2 {{ $header ? 'left-38 right-0' : 'left-0 right-0' }} z-50">
        <x-footer />
    </div>
    @endif
</body>

</html>