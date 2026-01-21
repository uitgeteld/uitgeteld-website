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
    $hasSidebar = isset($hasSidebar) ? $hasSidebar : false;
    @endphp

    <main class="{{ $hasSidebar ? 'ml-38 flex-1' : 'w-full' }} bg-slate-100">
        {{ $slot }}
    </main>

    @php
    $footerFixed = isset($footerFixed) ? $footerFixed : true;
    $showFooter = isset($showFooter) ? $showFooter : true;
    @endphp

    @if ($showFooter)
    @if ($footerFixed)
    <div class="fixed bottom-2 {{ $hasSidebar ? 'left-38 right-0' : 'left-0 right-0' }} z-50">
        <x-footer  />
    </div>
    @else
    <x-footer />
    @endif
    @endif
</body>

</html>