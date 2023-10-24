<x-app-layout>
    <div class="px-4 md:px-10 mx-auto w-full m-24 mt-0">
        <div class="flex flex-wrap justify-center ">
            <div class="w-full lg:w-8/12 px-4 mt-24">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg  border-0">
                    <div class="rounded-t bg-white mb-0 px-6 py-6">
                        <div class="text-center flex justify-between">
                            <h6 class="text-gray-700 text-xl font-bold">
                                Crear tienda
                            </h6>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form action="{{ route('staff.store.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Información basica
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Nombre
                                        </label>
                                        <input name="name" type="text"
                                            class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                             />
                                            @error('name')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror

                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Ruc
                                        </label>
                                        <input name="ruc" type="number"
                                            class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            />
                                            @error('ruc')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror

                                    </div>
                                </div>
                                
                            </div>

                            <hr class="mt-6 border-b-1 border-gray-300" />

                            <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Logo
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <input type="file" name="logo"
                                            class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            accept="image/png, image/jpg, image/jpeg"/>
                                            @error('logo')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror

                                    </div>
                                </div>
                                
                            </div>

                            <hr class="mt-6 border-b-1 border-gray-300" />

                            <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Descripción
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Descripción
                                        </label>
                                        <x-textarea name="description"></x-textarea>
                                        @error('description')
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
    </div>
</x-app-layout>