<nav
    class="absolute top-0 left-0 w-full z-10 md:flex-row md:flex-nowrap md:justify-start flex items-center p-4 bg-blue-900">
    <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
        <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold" href="./index.html">Dashboard</a>
        <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
            <a class="text-blueGray-500 block" href="#" onclick="openDropdown(event,'user-dropdown')">
                <div class="items-center flex">
                    <span
                        class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img
                            alt="foto de perfil" class="w-10 h-10 rounded-full"
                            src="{{ auth()->user()->profile }}" /></span>
                </div>
            </a>
            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                id="user-dropdown">
                @if (auth()->user()->hasRole('admin'))
                    <a href="#"
                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700 hover:bg-gray-300">Perfil</a>
                @endif
                @if (auth()->user()->hasRole('staff'))
                    <a href="{{ route('staff.profile') }}"
                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700 hover:bg-gray-300">Perfil</a>
                    <a href="{{ route('staff.store') }}"
                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700 hover:bg-gray-300">Mi tienda</a>
                @endif
                <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="submit" value="Cerrar sesión" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700 hover:bg-gray-300">
                </form>
            </div>
        </ul>
    </div>
</nav>
