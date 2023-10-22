<x-app-layout>


    <div class="px-4 md:px-10 mx-auto w-full -m-24 mt-0">
        <div class="flex flex-wrap">
            <div class="w-full mb-12 px-4 mt-24">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                    <div class="rounded-t bg-white mb-0 px-6 py-6">
                        <div class="text-center flex justify-between">
                            <h6 class="text-blueGray-700 text-xl font-bold">
                            </h6>
                            <x-link-button href="{{ route('admin.store.edit', ['store'=>$store[0]]) }}">Editar tienda</x-link-button>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form method="POST" action="{{ route('admin.staff.update',['user'=>$user] ) }}">
                            @csrf
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="flex flex-wrap justify-center">
                                        <div class="w-full  flex justify-center min-h-max" style="height: 15rem">
                                            <div class="relative">
                                                <img alt="logo" src="{{ $user->profile }}"
                                                    class="shadow-xl rounded-full align-middle border-none  max-w-150-px" />
                                            </div>
                                        </div>
                                        <div class="w-full px-4 text-center mt-1">
                                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                                <div class="mr-4 p-3 text-center">
                                                    <span class="mr-3 text-gray-500">Estado: </span>
                                                    @if ($user->status_id == 1)
                                                        <div
                                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60">
                                                            <h2 class="text-sm font-normal">Activo</h2>
                                                        </div>
                                                    @endif
                                                    @if ($user->status_id == 2)
                                                        <div
                                                            class="inline-flex items-center px-3 py-1 text-orange-500 rounded-full gap-x-2 bg-orange-100/60">
                                                            <h2 class="text-sm font-normal">Inactivo</h2>
                                                        </div>
                                                    @endif

                                                    @if ($user->status_id == 3)
                                                    <div class="inline-flex items-center px-3 py-1 text-yellow-500 rounded-full gap-x-2 bg-yellow-100/60">
                                                        <h2 class="text-sm font-normal">Bloqueado</h2>
                                                    </div>
                                                    @endif
                                                    @if ($user->status_id == 4)
                                                    <div class="inline-flex items-center px-3 py-1 text-red-500 rounded-full gap-x-2 bg-red-100/60">
                                                        <h2 class="text-sm font-normal">Cerrado</h2>
                                                    </div>
                                                    @endif
                                                    
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Información de usuario
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Nombre
                                        </label>
                                        <x-input type="text" name="name" value="{{ $user->name }}" ></x-input>
                                        @error('name')
                                            <span class="text-red-500">{{ $message  }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Correo electronico
                                        </label>
                                        <x-input type="text" value="{{ $user->email }}" class="border-none outline-none" disabled="true"></x-input>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Apellidos
                                        </label>
                                    </div>
                                    <x-input type="text" name="surnames" value="{{ $user->surnames }}" ></x-input>
                                    @error('surnames')
                                        <span class="text-red-500">{{ $message  }}</span>
                                    @enderror

                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Teléfono
                                        </label>
                                        <x-input type="text" name="phone" value="{{ $user->phone }}" ></x-input>
                                        @error('phone')
                                            <span class="text-red-500">{{ $message  }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <hr class="mt-2 border-b-1 border-blueGray-300" />

                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Dirección
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <x-input type="text" name="direction" value="{{ $direction[0]->direction }}" ></x-input>
                                        @error('direction')
                                            <span class="text-red-500">{{ $message  }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Departemento
                                        </label>
                                        <x-select name="department" class="w-full">
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"{{ $department->id == $direction[0]->department->id?'selected':'' }}>{{ $department->name }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Provincia
                                        </label>

                                        <x-select name="province" class="w-full">
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}"{{ $province->id == $direction[0]->province->id?'selected':'' }}>{{ $province->name }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Distrito
                                        </label>

                                        <x-select name="district" class="w-full">
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}"{{ $district->id == $direction[0]->district->id?'selected':'' }}>{{ $district->name }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-2 border-b-1 border-blueGray-300" />

                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Cambiar estado
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-1">
                                        <x-select name="status" class="w-full" id="status">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}" {{ $status->id == $user->status_id ? 'selected':'' }}>{{ $status->name }}</option>
                                            @endforeach
                                        </x-select>
                                        @error('reason')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                        <div id="reason-container" class="hidden">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                htmlFor="grid-password">
                                                Motivo <span class="text-red-500">(*)</span>
                                            </label>

                                            <x-textarea name="reason">

                                            </x-textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="flex justify-between">
                                <div></div>
                                <x-button>Guardar cambios</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#status').on('change', e =>{
                    let idStatus = $('#status').val();
                    if (idStatus == 3) {
                        $('#reason-container').removeClass('hidden');
                    }else{
                        $('#reason-container').addClass('hidden');
                    }
                })
            });
        </script>
</x-app-layout>
