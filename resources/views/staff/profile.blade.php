<x-app-layout>
    <div class="px-4 md:px-10 mx-auto w-full m-24 mt-0">
        <div class="flex flex-wrap justify-center ">
            <div class="w-full lg:w-8/12 px-4 mt-24">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-gray-200 w-full mb-6 shadow-xl rounded-lg mt-10 py-10 px-5">
                    <div class="flex justify-between">
                        <div></div>

                        <button onclick="window.modal.showModal();"
                            class="bg-green-600 text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md hover:bg-green-800 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">Editar</button>

                        <dialog id="modal" class="rounded">
                            <div class="flex-auto px-4 lg:px-10 py-10 pt-0 mt-10">
                                <form action="{{ route('staff.profile.update', ['user' => $user]) }}" method="POST"
                                    enctype="multipart/form-data">
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
                                                    value="{{ $user->name }}" />
                                                @error('name')
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                                    htmlFor="grid-password">
                                                    Apellidos
                                                </label>
                                                <input name="surnames" type="text"
                                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    value="{{ $user->surnames }}" />
                                                @error('surnames')
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                                    htmlFor="grid-password">
                                                    Telefono
                                                </label>
                                                <input name="phone" type="text"
                                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    value="{{ $user->phone }}" />
                                                @error('phone')
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                                    htmlFor="grid-password">
                                                    Fecha de nacimiento
                                                </label>
                                                <input name="birthday" type="date"
                                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    value="{{ $user->birthday->isoFormat('Y-M-D') }}" />
                                                @error('birthday')
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-6 border-b-1 border-gray-300" />

                                    <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                        Foto de perfil
                                    </h6>
                                    <div class="flex flex-wrap">
                                        <div class="w-full lg:w-12/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <input type="file" name="profile"
                                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    accept="image/png, image/jpg, image/jpeg" />
                                                @error('profile')
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>

                                    </div>

                                    <div class="flex justify-between mt-10">
                                        <x-link onclick="window.modal.close()">cancelar</x-link>
                                        <x-button>Guardar</x-button>
                                    </div>
                                </form>
                            </div>
                        </dialog>
                    </div>
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full px-4 flex justify-center">
                                <img alt="logo" src="{{ $user->profile }}"
                                    class="shadow-xl rounded h-auto align-middle border-none w-1/3" />
                            </div>
                            <div class="w-full px-4 text-center mt-5">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        <span class="text-sm text-gray-400">{{ $user->phone }}</span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                        <span class="text-sm text-gray-400">{{ $user->email }}</span>
                                    </div>
                                    <div class="lg:mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">
                                            <i class="fa-solid fa-cake-candles"></i>
                                        </span>
                                        <span
                                            class="text-sm text-gray-400">{{ $user->birthday->isoFormat('d/m/Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <h3 class="text-xl uppercase font-semibold leading-normal text-gray-700 mb-2">
                                {{ $user->name }} {{ $user->surnames }}
                            </h3>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
