<x-guest-layout>
    <div class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
        <div
            class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4  rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0">
                <h4 class="font-bold">Ingrese su email para restablecer su contraseña</h4>
            </div>
            <div class="flex-auto p-6">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
        
                    <div>
                        <x-label for="email" :value="__('Email')" />
        
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            Enviar enlace para restablecer contraseña
                        </x-button>
                    </div>
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                </form>
            </div>
            
        </div>
    </div>
    <div
        class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
        <div
            class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg')] rounded-xl ">
            <span
                class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
            <h3 class="z-20 mt-12 font-extrabold text-white">¡Te ayuudaremos a restablecer tu contraseña!</h3>
            <p class="z-20 text-white ">:(</p>
        </div>
    </div>

</x-guest-layout>
