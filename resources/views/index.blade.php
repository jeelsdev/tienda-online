<x-app-client-layout>
    <div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url({{ asset('images/banner-bg.jpg') }});">
        <div class="container">
            <h1 class="text-6xl text-gray-800 font-medium mb-4 capitalize">
                Descubre lo tenemos para ti<br> Todo en un solo lugar
            </h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam <br>
                accusantium perspiciatis, sapiente
                magni eos dolorum ex quos dolores odio</p>
            <div class="mt-12">
                <a href="{{ route('show-products') }}" class="bg-blue-900 border border-blue-900 text-white px-8 py-3 font-medium 
                    rounded-md hover:bg-transparent hover:text-blue-800">Ver productos</a>
            </div>
        </div>
    </div>

     <!-- features -->
     <div class="container py-16">
        <div class="w-10/12 grid grid-cols-1 md:grid-cols-3 gap-6 mx-auto justify-center">
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('icons/delivery-van.svg') }}" alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Envios gratis</h4>
                    <p class="text-gray-500 text-sm">Ordenes express $200</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('icons/money-back.svg') }}" alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Retorno de pedidos</h4>
                    <p class="text-gray-500 text-sm">Retornos dentro de los 30 dias.</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('icons/service-hours.svg') }}" alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Atención 24/7</h4>
                    <p class="text-gray-500 text-sm">Tus pedidos a cualquier hora.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ./features -->

    <!-- categories -->
    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Categorias</h2>
        <div class="grid grid-cols-3 gap-3" id="categories">
        </div>
    </div>
    <!-- ./categories -->

    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Productos top</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6" id="products">
        </div>
    </div>

    <script>
        $(document).ready(function(){
            var domain = window.location.origin;
            $.ajax({
                type:'GET',
                url: '/data/categories',
                data: {
                    limit: 6,
                }
            }).done(function(response){

            $.each(response, function(index, obj) {

                $('#categories').append(`
                <div class="relative rounded-sm overflow-hidden group">
                <img src="${obj.image}" alt="category 1" class="w-full">
                <a href="${domain}/products/product-category/${obj.id}"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">${obj.name}</a>
                </div>
            `);
            });
            }).fail(function(jqXHR, textStatus, errorThrown){
                console.log('The following error occured: '+ textStatus +" "+ errorThrown)
            })

            $.ajax({
                type:'GET',
                url: '/data/products',
                data: {
                    limit: 24,
                }
            }).done(function(response){
                $.each(response, function(index, obj){
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
                        <a href="/payment/${obj.id}"
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
                <a href="/payment/${obj.id}"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Comprar</a>
            </div>
                `)
                });
            
            }).fail(function(jqXHR, textStatus, errorThrown){
                console.log('The following error occured: '+ textStatus +" "+ errorThrown)
            })

        });
    </script>
</x-app-client-layout>