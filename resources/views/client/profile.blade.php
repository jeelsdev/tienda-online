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
                <a href="{{ route('client.profile') }}" class="relative text-blue-800 block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-regular fa-address-card"></i>
                    </span>
                    Perfil
                </a>
                <a href="{{ route('client.profile.show') }}" class="relative hover:text-blue-800 block capitalize transition">
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
    <div class="col-span-9 grid grid-cols-3 gap-4">

        <div class="shadow rounded bg-white px-4 pt-6 pb-8">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-medium text-gray-800 text-lg">Perfil personal</h3>
                <a href="{{ route('client.profile.edit') }}" class="text-blue-800">Edit</a>
            </div>
            <div class="space-y-1">
                <h4 class="text-gray-700 font-medium">{{ auth()->user()->name }}</h4>
                <p class="text-gray-800">{{ auth()->user()->email }}</p>
                <p class="text-gray-800">{{ auth()->user()->phone }}</p>
            </div>
        </div>

    </div>
    <!-- ./info -->

</div>
<!-- ./account wrapper -->
</x-app-client-layout>