<x-app-client-layout>
    <div class="container mb-8 pt-10">
        <div class="flex items-center mb-8">
            <div>
                <h2 class="font-extrabold text-gray-500 ml-5" style="font-size: xx-large">#Tiendas</h2>
            </div>
            <div>
            </div>
        </div>
        <div class="grid md:grid-cols-3 grid-cols-2 gap-6 col-span-9 space-y-4">
            @foreach ($stores as $store)
                <div class="md:flex justify-between border gap-6 p-4 border-gray-200 rounded">
                    <div class="w-32 rounded flex items-center justify-center">
                        <img src="{{ $store->logo }}" alt="tienda" class="w-full">
                    </div>
                    <div class="md:w-1/2 flex flex-col justify-between">
                        <div>
                            <h2 class="text-gray-800 text-xl font-medium uppercase">{{ $store->name }}</h2>
                            <p class="text-gray-500 text-sm pb-2">Ruc: {{ $store->ruc }}</p>
                        </div>
                        <p>{{ $store->description }}</p>
                        <a href="{{ route('show-products-store', ['store'=>$store]) }}"
                            class=" mt-5 px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Ver productos</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-client-layout>