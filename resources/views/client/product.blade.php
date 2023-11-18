<x-app-client-layout>

    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6 mt-10">
        <div>
            <img src="{{ $product->image }}" alt="product" class="w-full">
        </div>

        <div>
            <h2 class="text-3xl font-medium uppercase mb-2">{{ $product->name }}</h2>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Disponibilidad: </span>
                    @if ($product->amount > 0)
                    <span class="text-green-600">Con stock</span>
                    @else
                    <span class="text-red-600">Sin stock</span>
                    @endif
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Categoria: </span>
                    <span class="text-gray-600">{{ $product->category->name }}</span>
                </p>
            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-xl text-primary font-semibold">s/ {{ $product->price }}</p>
            </div>

            <p class="mt-4 text-gray-600">{{ $product->description }}</p>

            <div class="mt-6 flex gap-3 border-b border-gray-200 pb-5 pt-5">
                <a href="{{ route('product.payment', ['product'=>$product]) }}"
                    class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition">
                    <i class="fa-solid fa-bag-shopping"></i> Comprar
                </a>
            </div>
        </div>
    </div>
    <!-- ./product-detail -->

    <!-- description -->
    <div class="container pb-16 mt-10">
        <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium">Detalles del producto</h3>
        <div class="w-3/5 pt-6">
            <div class="text-gray-600">
                <p>{{ $product->description }}</p>
            </div>
        </div>
    </div>
    <!-- ./description -->

    <!-- related product -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Más productos</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6" id="products">
        </div>
    </div>
    <!-- ./related product -->

    <script>
        $(document).ready(function(){
            const domain = window.location.origin;
            $.ajax({
                type:'GET',
                url: '/data/products',
                data: {
                    limit: 8,
                }
            }).done(function(response){
                $.each(response, function(index, obj){
                    $('#products').append(`
                <div class="bg-white shadow rounded overflow-hidden group" style="display: flex; flex-direction: column; justify-content: space-between">
                <div class="relative">
                    <img src="${obj.image}" alt="product 1" class="w-full">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="${domain}/product/${obj.id}"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="${domain}/payment/${obj.id}"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4 flex flex-col justify-between">
                    <a href="${domain}/product/${obj.id}">
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
                <a href="${domain}/payment/${obj.id}"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Comprar</a>
            </div>
                `)
                });
            
            }).fail(function(jqXHR, textStatus, errorThrown){
                console.log('The following error occured: '+ textStatus +" "+ errorThrown)
            });
        });
    </script>

</x-app-client-layout>