<x-guest-layout>
    <div class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
        <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4  rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0">
            <h4 class="font-bold">Registrarse</h4>
            <p class="mb-0">Ingresa tu email y tu contraseña</p>
          </div>
          <div class="flex-auto p-6">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="mb-4">
                <x-input type="text" id="name" name="name" value="{{ old('name') }}"  placeholder="Nombres"></x-input>
              </div>
              <div class="mb-4">
                <x-input type="text" id="surname" name="surname" value="{{ old('surname') }}"  placeholder="Apellidos"></x-input>
              </div>
              <div class="mb-4">
                <x-input type="email" id="email" name="email" value="{{ old('email') }}"  placeholder="Email"></x-input>
              </div>
              <div class="mb-4">
                <x-input type="number" id="phone" name="phone" value="{{ old('phone') }}"  placeholder="Teléfono"></x-input>
              </div>
              <div class="mb-4">
                <x-input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}"  placeholder="Fecha de nacimiento"></x-input>
              </div>
              <div class="mb-4">
                <x-input type="password" placeholder="Contraseña" id="password" name="password" required autocomplete="current-password"></x-input>
                
              </div>
              <div class="mb-4">
                <x-input type="password" placeholder="Confirmar contraseña" id="password_confirmation" name="password_confirmation" required autocomplete="current-password"></x-input>
                
              </div>
              <div class="text-center">
                <button type="button" class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-pink-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Registrarse</button>
              </div>
            </form>
          </div>
          <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
            <p class="mx-auto mb-2 leading-normal text-sm">Ya tienes una cuenta? <a href="{{ route('login') }}" class="font-semibold text-transparent bg-clip-text bg-gradient-to-tl from-pink-500 to-violet-500">Inciar sesión</a></p>
            </div>
        </div>
      </div>
      <div class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
        <div class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg')] rounded-xl ">
          <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
          <h4 class="z-20 mt-12 font-bold text-white">"Attention is the new currency"</h4>
          <p class="z-20 text-white ">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
        </div>
      </div>
    
</x-guest-layout>
