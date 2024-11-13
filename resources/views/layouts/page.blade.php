<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Title -->
    <title>{{ config('app.name') }}</title>
</head>
<body class="bg-blue-900">
<div id="page">
    <div id="header"></div>

    <div id="main">
        @yield('main')
    </div>

    <div id="footer"></div>
</div>
</body>
</html>
