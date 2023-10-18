<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
            rel="stylesheet">
 
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>

        <!-- header -->
        <header class="py-4 shadow-sm bg-white">
            <div class="container flex items-center justify-between">
                <a href="index.html">
                    <img src="../assets/images/logo.svg" alt="Logo" class="w-32">
                </a>
    
                <div class="w-full max-w-xl relative flex">
                    <span class="absolute left-4 top-3 text-lg text-gray-400">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="text" name="search" id="search"
                        class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none"
                        placeholder="search">
                    <button
                        class="bg-primary border border-primary text-white px-8 rounded-r-md hover:bg-transparent hover:text-primary transition">Search</button>
                </div>
    
                <div class="flex items-center space-x-8">
                    <a href="#" class="text-center text-gray-700 hover:text-primary transition relative">
                        <div class="text-2xl">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <div class="text-xs leading-3 px-2">Wishlist</div>
                    </a>
                    <a href="#" class="text-center text-gray-700 hover:text-primary transition relative">
                        <div class="text-2xl">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                        <div class="text-xs leading-3 ml-5">Cart</div>
                    </a>
                    <a href="{{ route('login') }}" class="text-center text-gray-700 hover:text-primary transition relative">
                        <div class="text-2xl">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="text-xs leading-3">Iniciar sesión</div>
                    </a>
                    <a href="{{ route('register') }}" class="text-center text-gray-700 hover:text-primary transition relative">
                        <div class="text-2xl">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="text-xs leading-3">REGISTRARSE</div>
                    </a>
                </div>
            </div>
        </header>
        <!-- ./header -->
    
        <!-- navbar -->
        <nav class="bg-gray-800">
            <div class="container flex">
                <div class="px-8 py-4 bg-primary flex items-center cursor-pointer relative group">
                    <span class="text-white">
                        <i class="fa-solid fa-bars"></i>
                    </span>
                    <span class="capitalize ml-2 text-white">All Categories</span>
    
                    <!-- dropdown -->
                    <div
                        class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                        <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                            <img src="../assets/images/icons/sofa.svg" alt="sofa" class="w-5 h-5 object-contain">
                            <span class="ml-6 text-gray-600 text-sm">Sofa</span>
                        </a>
                        <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                            <img src="../assets/images/icons/terrace.svg" alt="terrace" class="w-5 h-5 object-contain">
                            <span class="ml-6 text-gray-600 text-sm">Terarce</span>
                        </a>
                        <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                            <img src="../assets/images/icons/bed.svg" alt="bed" class="w-5 h-5 object-contain">
                            <span class="ml-6 text-gray-600 text-sm">Bed</span>
                        </a>
                        <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                            <img src="../assets/images/icons/office.svg" alt="office" class="w-5 h-5 object-contain">
                            <span class="ml-6 text-gray-600 text-sm">office</span>
                        </a>
                        <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                            <img src="../assets/images/icons/outdoor-cafe.svg" alt="outdoor" class="w-5 h-5 object-contain">
                            <span class="ml-6 text-gray-600 text-sm">Outdoor</span>
                        </a>
                        <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                            <img src="../assets/images/icons/bed-2.svg" alt="Mattress" class="w-5 h-5 object-contain">
                            <span class="ml-6 text-gray-600 text-sm">Mattress</span>
                        </a>
                    </div>
                </div>
    
                <div class="flex items-center justify-between flex-grow pl-12">
                    <div class="flex items-center space-x-6 capitalize">
                        <a href="../index.html" class="text-gray-200 hover:text-white transition">Home</a>
                        <a href="pages/shop.html" class="text-gray-200 hover:text-white transition">Shop</a>
                        <a href="#" class="text-gray-200 hover:text-white transition">About us</a>
                        <a href="#" class="text-gray-200 hover:text-white transition">Contact us</a>
                    </div>
                    @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                </div>
            </div>
        </nav>
        <!-- ./navbar -->

    </body>
</html>
