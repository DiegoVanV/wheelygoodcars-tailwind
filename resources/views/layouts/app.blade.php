<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <nav class="bg-black flex py-3">
            <div class="w-full mx-auto px-4 flex">
                <a class="text-lg text-white min-w-48" href="{{ route('home') }}"><strong class="text-orange-500 text-bold">Wheely</strong> good cars<strong class="text-orange-500 text-bold">!</strong></a>
                <div class="flex justify-between w-full" id="navbarNav">
                    <ul class="flex items-end">
                        <li class="mr-4"><a class="text-white hover:text-gray-300" href="{{route ('cars.index')}}">Alle auto's</a></li>
                        @auth
                            <li class="mr-4"><a class="text-white hover:text-gray-300" href="{{route ('cars.viewMyCars')}}">Mijn aanbod</a></li>
                            <li class="mr-4"><a class="text-white hover:text-gray-300" href="{{route ('cars.main')}}">Aanbod plaatsen</a></li>
                        @endauth
                    </ul>
                    <ul class="flex">
                        @guest
                            <li class="mr-4"><a class="text-orange-500 hover:text-orange-400" href="{{ route('register') }}">Registreren</a></li>
                            <li class="mr-4"><a class="text-orange-500 hover:text-orange-400" href="{{ route('login') }}">Inloggen</a></li>
                        @endguest
                        @auth
                        <li class="mr-4"><a class="text-orange-500 hover:text-orange-400" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button class="text-orange-500 hover:text-orange-400" type="submit" class="hover:underline">Uitloggen</button>
                        </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <div class="max-w-7xl mx-auto px-4">
            {{ $slot }}
        </div>

        <audio id="backgroundSound">
            <source src="{{ asset('sounds/notification.mp3') }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let sound = document.getElementById("backgroundSound");
                let hasInteracted = false;

                function playSound() {
                    sound.play().catch(error => console.log("Autoplay geblokkeerd: " + error));
                }

                function startPlaying() {
                    if (!hasInteracted) {
                        hasInteracted = true;
                        playSound(); // Speel direct af bij eerste interactie
                        setInterval(playSound, 1000); // Daarna elke 10 seconden
                        document.removeEventListener("click", startPlaying);
                        document.removeEventListener("keydown", startPlaying);
                    }
                }

                // Wacht op eerste interactie (klik of toets)
                document.addEventListener("click", startPlaying);
                document.addEventListener("keydown", startPlaying);
            });
        </script>

    </body>
</html>
