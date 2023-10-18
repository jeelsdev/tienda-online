<x-app-layout>
    <div class="px-4 md:px-10 mx-auto w-full -m-24 mt-0">
        <div class="flex flex-wrap">
            <div class="w-full mb-12 px-4 mt-24">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                    
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-lg text-blueGray-700">
                                    Card Tables
                                </h3>

                                <div class="pt-5 relative mx-auto text-gray-600">
                                    <div class="flex justify-between">

                                        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none w-2/6"
                                          type="search" name="search" placeholder="Buscar por nombre o ruc">
                                            <select id="default" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/5 p-2.5">
                                                <option selected>Ordenar por</option>
                                                <option value="US">Nombres</option>
                                                <option value="CA">Telefono</option>
                                                <option value="FR">France</option>
                                                <option value="DE">Germany</option>
                                            </select>
                                        
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
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Nombres
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Apellidos
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Teléfono
                                    </th>

                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Correo
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Estado
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>

                                        <th
                                            class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            {{ $client->id }}
                                        </th>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                            
                                            <span class=" font-bold text-blueGray-600">
                                                {{ $client->name }}
                                            </span>
                                        </td>
                                        
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $client->surnames }}
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $client->phone }}
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                            {{ $client->email }}
                                            
                                        </td>
                                        <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        @if ($client->status_id == 1)
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60">
                                            <h2 class="text-sm font-normal">Activo</h2>
                                        </div>
                                            
                                        @endif
                                        @if ($client->status_id == 2)
                                        <div class="inline-flex items-center px-3 py-1 text-orange-500 rounded-full gap-x-2 bg-orange-100/60">
                                            <h2 class="text-sm font-normal">Inactivo</h2>
                                        </div>
                                        @endif
                                        @if ($client->status_id == 3)
                                        <div class="inline-flex items-center px-3 py-1 text-yellow-500 rounded-full gap-x-2 bg-yellow-100/60">
                                            <h2 class="text-sm font-normal">Bloqueado</h2>
                                        </div>
                                        @endif
                                        @if ($client->status_id == 4)
                                        <div class="inline-flex items-center px-3 py-1 text-red-500 rounded-full gap-x-2 bg-red-100/60">
                                            <h2 class="text-sm font-normal">Cerrado</h2>
                                        </div>
                                        @endif
                                    </td>
                                    <td
                                    class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap py-4 text-center">
                                    <a href="#pablo" class="text-blue-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none mr-2">
                                        Ver
                                    </a>
                                    <a href="#pablo" class="text-blue-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none">
                                        Editar
                                    </a>
                                    
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
