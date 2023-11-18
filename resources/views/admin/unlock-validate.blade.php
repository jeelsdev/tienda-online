<x-app-layout>
    <div class="px-4 md:px-10 mx-auto w-full -m-24 mt-0">
        <div class="flex flex-wrap">
            <div class="w-full mb-12 px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-100 border-0 mt-24">
                    <div class="rounded-t bg-white mb-0 px-6 py-6">
                        <div class="text-center flex justify-between">
                            <h6 class="text-gray-700 text-xl font-bold">
                            </h6>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form method="POST" action="{{ route('request.update', ['user'=>$unlock[0]->user, 'unlock'=>$unlock[0]]) }}">
                            @csrf
                            <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="flex flex-wrap justify-center">
                                        <div class="w-full  flex justify-center min-h-max" style="height: 15rem">
                                            <div class="relative inline-flex">
                                                <img alt="logo" src="{{ $unlock[0]->user->profile }}"
                                                    class="shadow-xl rounded-full align-middle border-none  max-w-150-px" />
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                            <hr class="mt-6 border-b-1 border-gray-300" />

                            <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Información de usuario
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Nombre
                                        </label>
                                        <x-input type="text" value="{{ $unlock[0]->user->name }}" disabled="true"
                                            class="border-none"></x-input>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Correo electronico
                                        </label>
                                        <x-input type="text" value="{{ $unlock[0]->user->email }}" disabled="true"
                                            class="border-none"></x-input>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Apellidos
                                        </label>
                                    </div>
                                    <x-input type="text" value="{{ $unlock[0]->user->surnames }}" disabled="true"
                                        class="border-none"></x-input>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Teléfono
                                        </label>
                                        <x-input type="text" value="{{ $unlock[0]->user->phone }}" disabled="true"
                                            class="border-none"></x-input>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-6 border-b-1 border-gray-300" />

                            <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Información de la solicitud
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password">
                                        Detalle
                                    </label>

                                    <x-textarea disabled>
                                        {{ $unlock[0]->description }}
                                    </x-textarea>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-2 border-b-1 border-gray-300" />

                            <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Cambiar estado
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-1">
                                        <x-select name="status" class="w-full" id="status">
                                            <option value="1">Activar</option>
                                            <option value="2">Bloquear</option>
                                        </x-select>
                                        @error('status')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="flex justify-between">
                                <div></div>
                                <x-button>Guardar</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
