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
        <main class="mt-0 transition-all duration-200 ease-in-out">
            <section>
              <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
                <div class="container z-1">
                  <div class="flex flex-wrap -mx-3">
                    {{ $slot }}
                  </div>
                </div>
              </div>
            </section>
          </main>
    </body>
</html>
