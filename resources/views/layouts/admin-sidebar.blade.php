<nav
class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
<div
    class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
    <button
        class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
        type="button" onclick="toggleNavbar('example-collapse-sidebar')">
        <i class="fas fa-bars"></i>
    </button>
    <a class="md:block text-center md:pb-2 text-black mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
        href="{{ route('dashboard') }}">
        Tienda online
    </a>
    
    <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
        id="example-collapse-sidebar">
        <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blue-200">
            <div class="flex flex-wrap">
                <div class="w-6/12">
                    <a class="md:block text-left md:pb-2 text-black mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                        href="{{ route('dashboard') }}">
                        Tienda online
                    </a>
                </div>
                <div class="w-6/12 flex justify-end">
                    <button type="button"
                        class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                        onclick="toggleNavbar('example-collapse-sidebar')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        <form class="mt-6 mb-4 md:hidden">
            <div class="mb-3 pt-0">
                <input type="text" placeholder="Search"
                    class="border-0 px-3 py-2 h-12 border border-solid border-blue-500 placeholder-blue-300 text-blue-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal" />
            </div>
        </form>
        <!-- Divider -->
        <hr class="my-4 md:min-w-full" />
        <!-- Heading -->
        <h6
            class="md:min-w-full text-black text-xs uppercase font-bold block pt-1 pb-4 no-underline">
            Inicio
        </h6>
        <!-- Navigation -->

        <ul class="md:flex-col md:min-w-full flex flex-col list-none">
            <li class="items-center">
                <a href="{{ route('dashboard') }}"
                    class="{{ setActive('dashboard')?'text-blue-500':'' }} text-xs uppercase py-3 font-bold block  hover:text-blue-600">
                    <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                    Dashboard
                </a>
            </li>
        </ul>

        <!-- Divider -->
        <hr class="my-4 md:min-w-full" />
        <!-- Heading -->
        <h6
            class="md:min-w-full text-black text-xs uppercase font-bold block pt-1 pb-4 no-underline">
            Tiendas
        </h6>
        <!-- Navigation -->

        <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
            <li class="items-center">
                <a href="{{ route('admin.stores.news') }}"
                    class="{{ setActive('admin.stores.news')?'text-blue-500':'' }} hover:text-blue-500 text-xs uppercase py-3 font-bold block">
                    <i class="fas fa-fingerprint  mr-2 text-sm"></i>
                    Nuevos
                </a>
            </li>

            <li class="items-center">
                <a href="{{ route('admin.stores') }}"
                    class="{{ setActive('admin.stores')?'text-blue-500':'' }} hover:text-blue-500 text-xs uppercase py-3 font-bold block">
                    <i class="fas fa-clipboard-list  mr-2 text-sm"></i>
                    Todos
                </a>
            </li>
        </ul>

        <!-- Divider -->
        <hr class="my-4 md:min-w-full" />
        <!-- Heading -->
        <h6
            class="md:min-w-full text-black text-xs uppercase font-bold block pt-1 pb-4 no-underline">
            Usuarios
        </h6>
        <!-- Navigation -->

        <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
            <li class="items-center">
                <a href="{{ route('admin.staffs') }}"
                    class="{{ setActive('admin.staffs')?'text-blue-500':'' }} hover:text-blue-500 text-xs uppercase py-3 font-bold block">
                    <i class="fas fa-newspaper  mr-2 text-sm"></i>
                    Vendedores
                </a>
            </li>
            <li class="items-center">
                <a href="{{ route('admin.clients') }}"
                    class="{{ setActive('admin.clients')?'text-blue-500':'' }} hover:text-blue-500 text-xs uppercase py-3 font-bold block">
                    <i class="fas fa-newspaper  mr-2 text-sm"></i>
                    clientes
                </a>
            </li>

            <li class="items-center">
                <a href="{{ route('request.index') }}"
                    class="{{ setActive('request.index')?'text-blue-500':'' }} hover:text-blue-500 text-xs uppercase py-3 font-bold block">
                    <i class="fas fa-user-circle  mr-2 text-sm"></i>
                    Solicitudes
                </a>
            </li>
        </ul>

        
    </div>
</div>
</nav>