<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased min-h-screen flex items-center justify-center bg-white p-4">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 absolute top-4" :status="session('status')" />

    <div class="bg-[#CDE4CE] rounded-2xl w-full max-w-[800px] flex flex-col md:flex-row py-12 px-6 md:px-12 mx-auto items-center relative" style="background-color: #c8e6c9;">
        
        <!-- Left Side: Logo and Text -->
        <div class="flex flex-col items-center justify-center w-full md:w-1/2 mb-10 md:mb-0">
            <img src="{{ asset('images/logosdnkondangjaya2.png') }}" alt="Logo" class="w-48 h-48 object-contain mb-6" />
            <h1 class="text-[#195bb2] text-2xl md:text-3xl font-extrabold text-center uppercase tracking-wide leading-tight">
                SDN KONDANGJAYA II
            </h1>
        </div>

        <!-- Vertical Divider -->
        <div class="hidden md:block w-px bg-gray-500 h-64 absolute left-1/2 transform -translate-x-1/2"></div>

        <!-- Right Side: Login Form -->
        <div class="w-full md:w-1/2 md:pl-16 flex flex-col justify-center">
            <form method="POST" action="{{ route('login') }}" class="w-full">
                @csrf

                <!-- Username -->
                <div class="mb-5">
                    <label for="username" class="block font-bold text-gray-900 text-[16px] mb-2">{{ __('Username') }}</label>
                    <input id="username" class="block w-full border-gray-400 focus:border-[#366835] focus:ring focus:ring-[#366835] focus:ring-opacity-50 rounded-xl shadow-sm px-4 py-2 bg-white text-gray-700" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" placeholder="Admin" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block font-bold text-gray-900 text-[16px] mb-2">{{ __('Password') }}</label>
                    <input id="password" class="block w-full border-gray-400 focus:border-[#366835] focus:ring focus:ring-[#366835] focus:ring-opacity-50 rounded-xl shadow-sm px-4 py-2 bg-white text-gray-700" type="password" name="password" required autocomplete="current-password" placeholder="Admin123" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-6 mt-3">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-500 text-[#366835] shadow-sm focus:border-[#366835] focus:ring focus:ring-[#366835] bg-transparent w-5 h-5 cursor-pointer" name="remember">
                        <span class="ms-2 text-[14px] text-gray-900 font-bold">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end space-x-5 mt-2">
                    @if (Route::has('password.request'))
                        <a class="text-[13px] font-bold text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <button type="submit" class="bg-[#366835] hover:bg-[#2b5329] text-white font-bold py-2 px-6 rounded-lg text-sm shadow-sm transition">
                        {{ __('LOG IN') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
