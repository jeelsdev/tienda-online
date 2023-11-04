<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>

    <header class="py-4 shadow-sm bg-white">
        <div class="container flex items-center justify-between">
            <a href="/">
                <img src="{{ asset('images/logo-ecommerce.png') }}" alt="Logo" class="w-16" width="100">
            </a>

            <div class="w-full max-w-xl relative flex">
                <span class="absolute left-4 top-3 text-lg text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" name="search" id="search"
                    class="w-full border border-blue-800 border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none"
                    placeholder="Buscar producto">
                <button
                    class="bg-blue-900 border border-blue-800 text-white px-8 rounded-r-md hover:bg-transparent hover:text-blue-900 transition">Search</button>
            </div>

            <div class="flex items-center space-x-8">

                <a href="{{ route('login') }}"
                    class="text-center text-gray-700 hover:text-blue-500 transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="text-xs leading-3">Iniciar sesión</div>
                </a>
                <a href="{{ route('register') }}"
                    class="text-center text-gray-700 hover:text-blue-500 transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="text-xs leading-3">REGISTRARSE</div>
                </a>
            </div>
        </div>
    </header>

    <nav class="bg-gray-800">
        <div class="container flex">
            <div class="px-8 py-4 bg-blue-900 flex items-center cursor-pointer relative group">
                <span class="text-white">
                    <i class="fa-solid fa-bars"></i>
                </span>
                <span class="capitalize ml-2 text-white">Todas las categorias</span>

                <div
                    class="absolute z-40 w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                    @foreach ($categories as $category)
                        <a href="{{ route('show-product-category', ['category'=>$category]) }}" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                            <img src="{{ asset($category->image) }}" alt="sofa" class="w-5 h-5 object-contain">
                            <span class="ml-6 text-gray-600 text-sm">{{ $category->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center justify-between flex-grow pl-12">
                <div class="flex items-center space-x-6 capitalize">
                    <a href="/" class="text-gray-200 hover:text-white transition">Inicio</a>
                    <a href="{{ route('show-products') }}" class="text-gray-200 hover:text-white transition">Productos</a>
                    <a href="{{ route('show-all-stores') }}" class="text-gray-200 hover:text-white transition">Tiendas</a>
                </div>
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    {{ $slot }}

    <footer class="bg-gray-800 pt-16 pb-12 border-t border-gray-100">
        <div class="container grid grid-cols-3">
            <div class="col-span-1 space-y-8 mr-2">
                <img src="{{ asset('images/logo-ecommerce.png') }}" alt="logo" class="w-16" width="100">
                <div class="mr-2">
                    <p class="text-gray-500">
                        Por aqui puedes buscar y encontrar todo lo que buscas.
                    </p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-gray-500"><i
                            class="fa-brands fa-facebook-square"></i></a>
                    <a href="#" class="text-gray-400 hover:text-gray-500"><i
                            class="fa-brands fa-instagram-square"></i></a>
                    <a href="#" class="text-gray-400 hover:text-gray-500"><i
                            class="fa-brands fa-twitter-square"></i></a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fa-brands fa-github-square"></i>
                    </a>
                </div>
            </div>

            <div class="col-span-2 grid gap-8">
                <div class="grid grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Categorias</h3>
                        <div class="mt-4 space-y-4">
                            @foreach ($categories as $category)
                                <a href="{{ route('show-product-category', ['category'=>$category]) }}"
                                    class="text-base text-gray-500 hover:text-white block">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Sobre nosotros</h3>
                        <div class="mt-4 space-y-4">
                            <a href="#" class="text-base text-gray-500 hover:text-white block">Pricing</a>
                            <a href="#" class="text-base text-gray-500 hover:text-white block">Documentation</a>
                            <a href="#" class="text-base text-gray-500 hover:text-white block">Guides</a>
                            <a href="#" class="text-base text-gray-500 hover:text-white block">API Status</a>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Tiendas</h3>
                        <div class="mt-4 space-y-4">
                            <a href="{{ route('register-staff') }}" class="text-base text-gray-500 hover:text-white block">REGISTRARSE</a>
                            <a href="#" class="text-base text-gray-500 hover:text-white block">Ver todas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="bg-gray-800 py-4">
        <div class="container flex items-center justify-center">
            <p class="text-white">&copy; ecommerce - Todos los derechos reservados</p>
        </div>
    </div>

</body>

</html>
