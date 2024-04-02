<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/bootstrap-grid.css', 'resources/css/bootstrap-reboot.css', 'resources/css/bootstrap.css', 'resources/css/app.css'])
    <!-- Styles -->
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    @include('components.navbar')
    @yield('content')
</body>

</html>
