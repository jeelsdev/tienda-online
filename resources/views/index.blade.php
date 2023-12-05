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
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                <div>
                    <h4 class="font-medium capitalize text-lg">Envios gratis</h4>
                    <p class="text-gray-500 text-sm">Ordenes express $200</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
<svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>
                <div>
                    <h4 class="font-medium capitalize text-lg">Retorno de pedidos</h4>
                    <p class="text-gray-500 text-sm">Retornos dentro de los 30 dias.</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('icons/service-hours.svg') }}" alt="Delivery" class="w-12 h-12 object-contain">
<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
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
