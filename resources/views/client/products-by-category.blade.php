<x-app-client-layout>

    <div class="container grid md:grid-cols-3 grid-cols-2 gap-6 pt-10 pb-16 items-start">

        <div class="col-span-3">
            <div class="flex items-center mb-8">
                <div>
                    <h2 class="font-extrabold text-gray-500 ml-5" style="font-size: xx-large">#{{ $category->name }} <small class="ml-5">({{ $count[0]->products_count }})</small></h2>
                </div>
                <div class="flex gap-2 ml-auto">
                    <select name="sort" id="sort"
                        class="w-60 text-sm text-gray-600 py-3 px-4 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary">
                        <option value="">Clasificación por defecto</option>
                        <option value="desc">Precio alto a bajo</option>
                        <option value="asc">Precio bajo a alto</option>
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-3 grid-cols-2 gap-6" id="products">
                @foreach ($products as $product)
                    <div class="bg-white shadow rounded overflow-hidden group"
                        style="display: flex; flex-direction: column; justify-content: space-between">
                        <div class="relative">
                            <img src="{{ $product->image }}" alt="product 1" class="w-full">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                <a href="{{ route('show-product', ['product' => $product]) }}"
                                    class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                    title="view product">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="#"
                                    class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                    title="add to wishlist">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </a>
                            </div>
                        </div>
                        <div class="pt-4 pb-3 px-4">
                            <a href="#">
                                <h4
                                    class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                    {{ $product->name }}</h4>
                            </a>
                            <div class="flex items-baseline mb-1 space-x-2">
                                <p class="text-xl text-primary font-semibold">s/ {{ $product->price }}</p>
                            </div>
                            <div class="flex items-center">
                                <div class="text-xs text-gray-500 ml-3">categoria: </div>
                                <div class="text-xs text-gray-500 ml-3">{{ $product->category->name }}</div>
                            </div>

                        </div>
                        <a href="#"
                            class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">comprar</a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- ./products -->
    </div>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $('#sort').on('change', function(){
                var category = [{{ $category->id }}];
                var sort = $('#sort').val();

                $.ajax({
                    type: 'POST', 
                    url: '/data/products-categories',
                    data: {
                        categories: category,
                        sort: sort
                    }
                }).done(function(response) {
                    $('#products').empty();
                    $.each(response, function(index, obj) {
                        $('#products').append(`
                <div class="bg-white shadow rounded overflow-hidden group" style="display: flex; flex-direction: column; justify-content: space-between">
                <div class="relative">
                    <img src="${obj.image}" alt="product 1" class="w-full">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="product/${obj.id}"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="product/${obj.id}">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">${obj.name}</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">s/ ${obj.price}</p>
                    </div>
                    <div class="flex items-center">
                        <div class="text-xs text-gray-500 ml-3">categoria: </div>
                        <div class="text-xs text-gray-500 ml-3">${obj.category.name}</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Comprar</a>
            </div>
                `)
                    });
                })
            })

        });
    </script>

</x-app-client-layout>
