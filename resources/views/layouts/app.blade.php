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
<body>
<div id="page">
    <div id="header" class="px-5 md:px-20 py-5">
        <div x-data="dropdown" class="flex flex-row justify-between items-center">
            <img src="{{ asset('logo.svg') }}" alt="Logo" width="50">

            <div class="flex justify-center">
                <div x-data="dropdown" class="relative">
                    <button x-ref="button" x-on:click="toggle()" type="button" class="flex items-center gap-2 px-5 py-2 rounded-md shadow">
                        {{ Auth::user()->name }}

                        <img src="{{ asset('icons/chevron-down.svg') }}" alt="" width="15" x-show="!open">
                        <img src="{{ asset('icons/chevron-up.svg') }}" alt="" width="15" x-show="open">
                    </button>

                    <div x-show="open" x-on:click.outside="close($refs.button)" style="display: none;" class="absolute right-0 mt-2 w-40 rounded-md bg-white shadow-md">
                        <form action="{{ route('auth.logout') }}" method="post">
                            @csrf

                            <button class="bg-blue-900 hover:bg-blue-800 text-white px-3 py-2 rounded w-full">
                                Uitloggen
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-5">
    </div>

    <div id="main">
        {{ $slot }}
    </div>

    <div id="footer"></div>
</div>
</body>
</html>
