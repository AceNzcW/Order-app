<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const dropdownButton = document.getElementById('dropdownButton');
                const dropdownMenu = document.getElementById('dropdownMenu');
        
                dropdownButton.addEventListener('click', function () {
                    dropdownMenu.classList.toggle('hidden');
                });
        
                document.addEventListener('click', function (event) {
                    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            });
        </script>
        
        <nav class="bg-white shadow-sm">
            <div class="container mx-auto flex justify-between items-center p-4">
                <a class="text-xl font-bold" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
        
                <div class="flex items-center space-x-4">
                    @guest
                        @if (Route::has('login'))
                            <a class="text-gray-700 hover:text-blue-500" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif
        
                        @if (Route::has('register'))
                            <a class="text-gray-700 hover:text-blue-500" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <!-- Dropdown -->
                        <div class="relative">
                            <button id="dropdownButton" class="text-gray-700 hover:text-blue-500 focus:outline-none">
                                {{ Auth::user()->name }}
                            </button>
                            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-20">
                                <a href="{{ route('logout') }}" 
                                   class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>                            
    </div>

    <div class="py-4">
        @yield('content')
    </div>
</body>
</html>
