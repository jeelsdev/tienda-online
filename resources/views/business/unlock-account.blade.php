
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
        <div class="h-auto grid grid-cols-3 gap-4 content-center">
            <div></div>
            <div class="flex flex-col w-full max-w-full mt-32">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4  rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 text-center">
                        <h4 class="font-bold">Hola! para enviar su solicitud, complete el siguiente formulario</h4>
                    </div>
                    <div class="flex-auto p-6">
                        <form method="POST" action="{{ route('unlock.account.store') }}">
                            @csrf
                            <div>
                                <label class="block uppercase text-gray-800 text-xs font-bold mb-2"
                                htmlFor="grid-password">
                                Email <span class="text-red-500">(*)</span>
                            </label>
                
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email')??$email }}" required autofocus />
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div id="reason-container" class="mt-4">
                                <label class="block uppercase text-gray-800 text-xs font-bold mb-2"
                                    htmlFor="grid-password">
                                    Descripción <span class="text-red-500">(*)</span>
                                </label>

                                <x-textarea name="description">
                                    {{ request('description') }}
                                </x-textarea>
                                @error('description')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror

                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-button>
                                    Enviar solicitud
                                </x-button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
            <div></div>
        </div>
        <div></div>

        <div class="py-4 mt-40">
            <div class="container flex items-center justify-between">
                <div class="flex gap-5">
                    <a href="/" class="text-base text-gray-500 hover:text-black">Store</a>
                    <a href="{{ route('show-products') }}" class="text-base text-gray-500 hover:text-black">Productos</a>
                    <a href="{{ route('show-all-stores') }}" class="text-base text-gray-500 hover:text-black">Tiendas</a>
                </div>
                <p class=" text-gray-500">&copy; store - Todos los derechos reservados</p>
            </div>
        </div>
    </body>
</html>