<x-app-client-layout>

    @php

        require base_path('vendor/autoload.php');

        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
        $preference = new MercadoPago\Preference();

        $item = new MercadoPago\Item();
        $item->title = $product->name;
        $item->quantity = 1;
        $item->unit_price = $product->price;

        $preference->items = [$item];
        $preference->back_urls = [
            'success' => 'http://127.0.0.1:8000/history',
            'failure' => 'http://www.tu-sitio/failure',
            'pending' => 'http://www.tu-sitio/pending',
        ];
        $preference->auto_return = 'approved';
        $preference->save();

    @endphp

    <div class="container grid grid-cols- gap-6 mt-10 mb-5">
        <div class="border gap-6 p-4 border-gray-200 rounded">
            <h2 class="font-bold text-gray-500 mb-4">Resumen</h2>
            <div class="flex items-center justify-between ">
                <div class="flex items-center justify-start">
                    <div class="w-28">
                        <img src="{{ $product->image }}" alt="product" class="w-full">
                    </div>
                    <div class="w-1/3 ml-4">
                        <h2 class="text-gray-800 text-xl font-medium uppercase">{{ $product->name }}</h2>
                        <p class="text-gray-500 text-sm">Cantidad: <span class="text-green-600">1</span></p>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 md:w-full">
                    <div class="">
                        <div class="text-gray-600 text-lg font-semibold text-center"> Precio</div>
                        <div class="text-lg font-semibold text-center"> {{ $product->price }}</div>
                    </div>
                    <div class="">
                        <div class="text-gray-600 text-lg font-semibold text-center"> Cant.</div>
                        <div class="text-lg font-semibold text-center"> 1</div>
                    </div>
                    <div class="">
                        <div class="text-gray-600 text-lg font-semibold text-center"> Total</div>
                        <div class="text-lg font-semibold text-center"> {{ $product->price * 1 }}</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="border gap-6 p-4 border-gray-200 rounded">
            <div class="flex items-center justify-between ">
                <div class="flex items-center justify-start">
                    <div class="w-1/3">
                        <img src="{{ asset('images/payment-logo.png') }}" alt="product" class="w-full">
                    </div>
                </div>
                <div class="">
                    <div class="text-gray-600 text-lg font-semibold text-start"> Subtotal: {{ $product->price - ($product->price * 18)/100  }}</div>
                    <div class="text-lg font-extrabold text-start"> Total: {{ $product->price }}</div>
                    <div id="wallet_container" class="mt-5"></div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
            locale: 'es-AR'
        });

        mp.checkout({
            preference: {
                id: "{{ $preference->id }}"
            },
            render: {
                container: '#wallet_container',
                label: 'Pagar'
            }
        })

        // const bricksBuilder = mp.bricks();


        // mp.bricks().create("wallet", "wallet_container", {
        //    initialization: {
        //        preferenceId: "{{ $preference->id }}",
        //    },
        // });
    </script>
</x-app-client-layout>
