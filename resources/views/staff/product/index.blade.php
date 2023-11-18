<x-app-layout>
    <div class="px-4 md:px-10 mx-auto w-full -m-24 mt-0">
        <div class="flex flex-wrap">
            <div class="w-full mb-12 px-4 mt-24">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">

                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-lg text-blueGray-700">
                                    Productos
                                </h3>
                                <div class="pt-5 relative mx-auto text-gray-600">
                                    <form method="GET" action="#" id="search-form" class="lg:flex justify-between">
                                        <div class="flex">
                                            <x-input type="text" name="search" id="search-name"
                                                value="{{ request('search') }}"
                                                placeholder="Buscar por nombre"></x-input>
                                            <x-button class="ml-5 h-10">Buscar</x-button>
                                        </div>
                                        <div class="flex justify-between lg:w-1/3">
                                            <div class="w-1/2">
                                                <x-select id="search-category" name="category" class=" w-full h-10">
                                                    <option {{ request('category') == '' ? 'selected' : '' }}
                                                        value="">todas las categorias</option>
                                                    @foreach ($categories as $category)
                                                        <option
                                                            {{ request('category') == $category->id ? 'selected' : '' }}
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </x-select>
                                            </div>
                                            <div class="w-1/2 ml-2">
                                                <x-select id="search-status" name="status" class=" w-full">
                                                    <option {{ request('status') == '' ? 'selected' : '' }}
                                                        value="">Todos los estados</option>
                                                    <option {{ request('status') == 1 ? 'selected' : '' }}
                                                        value="1">
                                                        Activo</option>
                                                    <option {{ request('status') == 2 ? 'selected' : '' }}
                                                        value="2">
                                                        Inactivo</option>
                                                </x-select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>

                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        ID
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Nombre
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Precio
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Cantidad
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Categoria
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Estado
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>

                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $product->id }}
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                            {{ $product->name }}
                                        </td>

                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $product->price }}
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $product->amount }}
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $product->category->name }}
                                        </td>
                                        <td
                                            class="border-t-0 px-1 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-center">
                                            @if ($product->status_id == 1)
                                                <div
                                                    class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500">
                                                    <h2 class="text-sm font-normal">Activo</h2>
                                                </div>
                                            @endif
                                            @if ($product->status_id == 2)
                                                <div
                                                    class="inline-flex items-center px-3 py-1 text-orange-500 rounded-full gap-x-2">
                                                    <h2 class="text-sm font-normal">Inactivo</h2>
                                                </div>
                                            @endif
                                        </td>
                                        <td
                                            class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap py-4 text-center">
                                            @if (auth()->user()->store->status_id == 1)
                                                <x-link
                                                    href="{{ route('staff.product.show', ['product' => $product]) }}"><i
                                                        class="fa-solid fa-eye fa-lg"></i></x-link>
                                                <x-link
                                                    href="{{ route('staff.product.edit', ['product' => $product]) }}"><i
                                                        class="fa-solid fa-pen-to-square fa-lg"></i></x-link>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const form = document.getElementById('search-form');
        const searchName = document.getElementById('search-name');
        const searchStatus = document.getElementById('search-status');
        const searchCategory = document.getElementById('search-category');

        searchName.addEventListener('keypress', function(e) {
            if (e.key == "Enter") {
                form.submit();
            }
        });
        searchStatus.addEventListener('change', function(e) {
            form.submit();
        });
        searchCategory.addEventListener('change', function(e) {
            form.submit();
        });
    </script>

</x-app-layout>
