<x-app-client-layout>
   <!-- account wrapper -->
   <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">

    <!-- sidebar -->
    <div class="col-span-3">
        <div class="px-4 py-3 shadow flex items-center gap-4">
            <div class="flex-shrink-0">
                <img src="{{ auth()->user()->profile }}" alt="profile"
                    class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
            </div>
            <div class="flex-grow">
                <p class="text-gray-600">Holaa!</p>
                <h4 class="text-gray-800 font-medium">{{ auth()->user()->name }}</h4>
            </div>
        </div>

        <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
            <div class="space-y-1 pl-8">
                <a href="{{ route('client.profile') }}" class="relative hover:text-blue-800 block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-regular fa-address-card"></i>
                    </span>
                    Perfil
                </a>
                <a href="{{ route('client.profile.show') }}" class="relative text-blue-800 block capitalize transition">
                    Información de perfil
                </a>
                <a href="{{ route('client.profile.edit') }}" class="relative hover:text-blue-800 block capitalize transition">
                    Editar perfil
                </a>
            </div>

            <div class="space-y-1 pl-8 pt-4">
                <a href="{{ route('client.history') }}" class="relative hover:text-blue-800 block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-solid fa-outdent"></i>
                                        </span>
                    Historial de compras
                </a>
            </div>

            <div class="space-y-1 pl-8 pt-4">
                <form method="POST" action="{{ route('logout') }}" class="relative ">
                    @csrf
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </span>
                    <input type="submit" value="Cerrar sesión" class="hover:text-blue-800 block font-medium capitalize transition">
                </form>
            </div>

        </div>
    </div>
    <!-- ./sidebar -->

    <!-- info -->
    <div class="col-span-9 grid  gap-4">

        <div class="px-4 md:px-10 mx-auto w-full -m-24 mt-0">
            <div class="flex flex-wrap">
                <div class="w-full mb-12 px-4 ">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                            <form>
                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                    Información de perfil
                                </h6>
                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                htmlFor="grid-password">
                                                Nombre
                                            </label>
                                            <x-input type="text" value="{{ auth()->user()->name }}" disabled="true"
                                                class="border-none"></x-input>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                htmlFor="grid-password">
                                                Correo electronico
                                            </label>
                                            <x-input type="text" value="{{ auth()->user()->email }}" disabled="true"
                                                class="border-none"></x-input>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                htmlFor="grid-password">
                                                Apellidos
                                            </label>
                                        </div>
                                        <x-input type="text" value="{{ auth()->user()->surnames }}" disabled="true"
                                            class="border-none"></x-input>
                                    </div>
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                htmlFor="grid-password">
                                                Teléfono
                                            </label>
                                            <x-input type="text" value="{{ auth()->user()->phone }}" disabled="true"
                                                class="border-none"></x-input>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./info -->

</div>
<!-- ./account wrapper -->
</x-app-client-layout>