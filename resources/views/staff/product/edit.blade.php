<x-app-layout>
    <div class="px-4 md:px-10 mx-auto w-full -m-24 mt-0">
        <div class="flex flex-wrap">
            <div class="w-full mb-12 px-4 mt-24">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form action="{{ route('staff.product.update', ['product'=>$product]) }}" method="POST" enctype="multipart/form-data">
                           @csrf
                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Editar producto
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Nombre
                                        </label>
                                        <x-input type="text" name="name" value="{{ old('name')??$product->name }}" ></x-input>
                                        @error('name')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="relative w-full my-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Precio
                                        </label>
                                        <x-input type="text" name="price" value="{{ old('price')??$product->price }}"></x-input>
                                        @error('price')
                                             <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="relative w-full my-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Cantidad
                                        </label>
                                        <x-input type="text" name="amount" value="{{ old('amount')??$product->amount }}"></x-input>
                                        @error('amount')
                                             <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="relative w-full my-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Categoria
                                        </label>
                                        <x-select name="category" class="w-full">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id?'selected':'' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </x-select>
                                        @error('category')
                                             <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="relative w-full">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlFor="grid-password">
                                            Descripción
                                        </label>

                                        <x-textarea name="description">
                                            {{ old('description')??$product->description }}
                                        </x-textarea>
                                        @error('description')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="flex flex-wrap justify-center">
                                        <div class="w-full  flex justify-center min-h-max" style="height: 15rem">
                                            <img alt="product" src="{{ $product->image }}"
                                                class="shadow-xl rounded-lg align-middle border-none  max-w-150-px h-auto lg:w-1/2" />
                                        </div>
                                        <div class="w-full px-4 text-center mt-1">
                                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                                <div class="mr-4 p-3 text-center">
                                                    <x-label class="text-left uppercase">Imagen</x-label>
                                                    <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 file:py-2 file:px-4 file:text-white file:bg-blue-500 hover:file:bg-blue-700 file:border-none" id="file_input" type="file" accept="image/png, image/jpg">
                                                    @error('image')
                                                        <span class="text-red-500 text-left">{{ $message }}</span>
                                                    @enderror
        
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr class="mt-2 border-b-1 border-blueGray-300" />

                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Estado
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <x-select id="status" name="status" class="w-full">
                                            <option value="1" {{ $product->status_id==1 ? 'selected':'' }}>Activo</option>
                                            <option value="2" {{ $product->status_id==2 ? 'selected':'' }}>Inactivo</option>
                                        </x-select>
                                        @error('status')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
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

</x-app-layout>
