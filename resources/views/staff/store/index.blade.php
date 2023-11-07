<x-app-layout>
    <div class="px-4 md:px-10 mx-auto w-full m-24 mt-0">
        <div class="flex flex-wrap justify-center ">
            <div class="w-full lg:w-8/12 px-4 mt-24">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-10">
                    <div class="flex justify-between">
                        <div></div>
                        <x-link-button href="{{ route('staff.store.edit', ['store'=>$store]) }}" class="ml-5">Editar</x-link-button>
                    </div>
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full px-4 flex justify-center">
                                    <img alt="logo" src="{{ $store->logo }}"
                                        class="shadow-xl rounded h-auto align-middle border-none w-1/3" />
                            </div>
                            <div class="w-full px-4 text-center mt-5">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">
                                            22
                                        </span>
                                        <span class="text-sm text-gray-400">Productos</span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">
                                            10
                                        </span>
                                        <span class="text-sm text-gray-400">Vendidos</span>
                                    </div>
                                    <div class="lg:mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">
                                            89
                                        </span>
                                        <span class="text-sm text-gray-400">Ganancias</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <h3 class="text-xl uppercase font-semibold leading-normal text-gray-700 mb-2">
                                {{ $store->name }}
                            </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-gray-400 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-gray-400"></i>
                                {{ $store->ruc }}
                            </div>
                            {{-- <div class="mb-2 text-gray-600 mt-10">
                                <i class="fas fa-briefcase mr-2 text-lg text-gray-400"></i>
                                Solution Manager - Creative Tim Officer
                            </div>
                            <div class="mb-2 text-gray-600 flex">
                                <div class="m-5">
                                    <i class="fas fa-university mr-2 text-lg text-gray-400"></i>
                                    University of Computer Science
                                </div>
                                <div class="m-5">
                                    <i class="fas fa-university mr-2 text-lg text-gray-400"></i>
                                    University of Computer Science
                                </div>
                                <div class="m-5">
                                    <i class="fas fa-university mr-2 text-lg text-gray-400"></i>
                                    University of Computer Science
                                </div>
                            </div> --}}
                        </div>
                        <div class="mt-10 py-10 border-t border-gray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-gray-700">
                                        {{ $store->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
