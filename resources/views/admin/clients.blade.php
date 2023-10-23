<x-app-layout>
    <div class="px-4 md:px-10 mx-auto w-full -m-24 mt-0">
        <div class="flex flex-wrap">
            <div class="w-full mb-12 px-4 mt-24">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-lg text-blueGray-700">
                                    Clientes
                                </h3>
                                <div class="pt-5 relative mx-auto text-gray-600">
                                    <form method="GET" action="#" id="search-form" class="flex justify-between">
                                        <div class="flex">
                                            <x-input type="text" name="search" id="search-name" value="{{ request('search') }}" placeholder="Buscar por nombre o apellido"></x-input>
                                            <x-button class="ml-5 h-10">Buscar</x-button>
                                        </div>
                                        <div class="w-1/5">
                                            <x-select id="search-status" name="status" class=" w-full">
                                                <option {{ request('status') == '' ? 'selected':'' }} value="" >Todos</option>
                                                <option {{ request('status') == 1 ? 'selected':''  }} value="1">Activo</option>
                                                <option {{ request('status') == 2 ? 'selected':''  }} value="2">Inactivo</option>
                                                <option {{ request('status') == 3 ? 'selected':''  }} value="3">bloqueado</option>
                                                <option {{ request('status') == 4 ? 'selected':''  }} value="4">cerrado</option>
                                            </x-select>
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
                                    <x-link href="{{ route('admin.client.show', ['client'=>$client]) }}">Ver más</x-link>
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $clients->links() }}
            </div>
        </div>
    </div>
    <script>
        const form = document.getElementById('search-form');
        const searchName = document.getElementById('search-name');
        const searchStatus = document.getElementById('search-status');
        
        searchName.addEventListener('keypress', function(e){
            if(e.key == "Enter"){
                form.submit();
                console.log('enviado');
            }
        });
        searchStatus.addEventListener('change', function(e){
                form.submit();
                console.log('enviado');
        })
    </script>

</x-app-layout>
