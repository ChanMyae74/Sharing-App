<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'SHARING') }}</title>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/view-ui-plus/dist/styles/viewuiplus.css">
    <script type="text/javascript" src="https://unpkg.com/vue@next"></script>
    <script type="text/javascript" src="https://unpkg.com/view-ui-plus"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="shortcut icon" href="{{asset('Images/Icon/S.svg')}}" type="image/x-icon">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Scripts -->
    @routes
    @inertiaHead
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
</head>
<body>
@inertia
</body>
</html>
