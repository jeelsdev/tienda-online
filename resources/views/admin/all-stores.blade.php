<x-app-layout>
    <div class="px-4 md:px-10 mx-auto w-full -m-24 mt-0">
        <div class="flex flex-wrap">
            <div class="w-full mb-12 px-4 mt-24">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                    
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-lg text-blueGray-700">
                                    Tiendas
                                </h3>
                                <div class="pt-5 relative mx-auto text-gray-600">
                                    <div class="flex justify-between">

                                        <x-input type="search" name="search" placeholder="Buscar por nombre o ruc"></x-input>

                                        <x-select class="md:w-1/5 ">
                                            <option selected>Filtrar por estado</option>
                                            <option value="US">United statuss</option>
                                            <option value="CA">Canada</option>
                                            <option value="FR">France</option>
                                            <option value="DE">Germany</option>
                                        </x-select>
                                        
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>

                                    <th
                                        class="px-3 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        ID
                                    </th>
                                    <th
                                        class="px-1 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Nombre
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        RUC
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
                                @foreach ($stores as $store)
                                    <tr>

                                        <th
                                            class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            {{ $store->id }}
                                        </th>
                                        <td
                                            class="border-t-0 px-1 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap py-4 text-left flex items-center">
                                            
                                            <span class=" font-bold text-blueGray-600">
                                                {{ $store->name }}
                                            </span>
                                        </td>
                                        
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $store->ruc }}
                                        </td>
                                        <td
                                            class="border-t-0 px-1 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-center">
                                            @if ($store->status_id == 1)
                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60">
                                                <h2 class="text-sm font-normal">Activo</h2>
                                            </div>
                                                
                                            @endif
                                            @if ($store->status_id == 2)
                                            <div class="inline-flex items-center px-3 py-1 text-orange-500 rounded-full gap-x-2 bg-orange-100/60">
                                                <h2 class="text-sm font-normal">Inactivo</h2>
                                            </div>
                                            @endif
                                            @if ($store->status_id == 3)
                                            <div class="inline-flex items-center px-3 py-1 text-yellow-500 rounded-full gap-x-2 bg-yellow-100/60">
                                                <h2 class="text-sm font-normal">Bloqueado</h2>
                                            </div>
                                            @endif
                                            @if ($store->status_id == 4)
                                            <div class="inline-flex items-center px-3 py-1 text-red-500 rounded-full gap-x-2 bg-red-100/60">
                                                <h2 class="text-sm font-normal">Cerrado</h2>
                                            </div>
                                            @endif
                                        </td>
                                        <td
                                        class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap py-4 text-center">
                                        <x-link href="{{ route('admin.store.show', ['store'=>$store]) }}">Ver</x-link>
                                        <x-link href="{{ route('admin.store.edit', ['store'=>$store]) }}">Editar</x-link>
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
</x-app-layout>
