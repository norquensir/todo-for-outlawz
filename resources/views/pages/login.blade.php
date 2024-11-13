@extends('layouts.page')

@section('main')
    <div class="mt-10">
        <div class="flex flex-col items-center">
            <img src="{{ asset('logo.svg') }}" alt="Logo" width="50" class="mb-10">

            <form method="post" action="{{ route('auth.login') }}" class="bg-white flex flex-col gap-5 md:w-1/2 rounded p-5 shadow">
                @csrf

                <div class="flex flex-col gap-1">
                    <label for="email" class="font-semibold">E-mailadres</label>
                    <input type="email" name="email" id="email" class="border rounded p-2" value="{{ old('email') }}" required>

                    @error('email')
                    <div class="mt-1 text-red-500">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label for="password" class="font-semibold">Wachtwoord</label>
                    <input type="password" name="password" id="password" class="border rounded p-2" required>

                    @error('password')
                    <div class="mt-1 text-red-500">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="bg-blue-900 hover:bg-blue-800 text-white rounded px-5 py-2">
                    Inloggen
                </button>

                <hr>

                <a href="{{ route('pages.register') }}" class="self-center text-blue-900 hover:text-blue-800">
                    Heb je nog geen account? Meld je dan hier aan.
                </a>
            </form>
        </div>
    </div>
@endsection
