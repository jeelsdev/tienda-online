<x-app-client-layout>
    
    <!-- account wrapper -->
    <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">
 
     <!-- sidebar -->
     <div class="col-span-3">
         <div class="px-4 py-3 shadow flex items-center gap-4">
             <div class="flex-shrink-0">
                 <img src="{{ auth()->user()->profile }}" alt="profile"
                     class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
             </div>
             <div class="flex-grow">
                 <p class="text-gray-600">Holaa!</p>
                 <h4 class="text-gray-800 font-medium">{{ auth()->user()->name }}</h4>
             </div>
         </div>
 
         <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
             <div class="space-y-1 pl-8">
                 <a href="{{ route('client.profile') }}" class="relative hover:text-blue-800 block font-medium capitalize transition">
                     <span class="absolute -left-8 top-0 text-base">
                         <i class="fa-regular fa-address-card"></i>
                     </span>
                     Perfil
                 </a>
                 <a href="{{ route('client.profile.show') }}" class="relative hover:text-blue-800 block capitalize transition">
                     Información de perfil
                 </a>
                 <a href="{{ route('client.profile.edit') }}" class="relative hover:text-blue-800 block capitalize transition">
                     Editar perfil
                 </a>
             </div>
 
             <div class="space-y-1 pl-8 pt-4">
                 <a href="{{ route('client.history') }}" class="relative text-blue-800 block font-medium capitalize transition">
                     <span class="absolute -left-8 top-0 text-base">
                         <i class="fa-solid fa-outdent"></i>
                                         </span>
                     Historial de compras
                 </a>
             </div>
 
             <div class="space-y-1 pl-8 pt-4">
                 <form method="POST" action="{{ route('logout') }}" class="relative ">
                     @csrf
                     <span class="absolute -left-8 top-0 text-base">
                         <i class="fa-solid fa-right-from-bracket"></i>
                     </span>
                     <input type="submit" value="Cerrar sesión" class="hover:text-blue-800 block font-medium capitalize transition">
                 </form>
             </div>
 
         </div>
     </div>
     <!-- ./sidebar -->
 
      <!-- wishlist -->
      <div class="col-span-9 space-y-4">
        @foreach ($transactions as $transaction)
            <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                <div class="w-28">
                    <img src="{{ $transaction->product->image }}" alt="product" class="w-full">
                </div>
                <div class="w-1/3">
                    <h2 class="text-gray-800 text-xl font-medium uppercase">{{ $transaction->product->name }}</h2>
                    <p class="text-gray-500 text-sm">Cantidad: <span class="text-green-600">{{ $transaction->amount }}</span></p>
                </div>
                <div class="text-lg font-semibold">s/ {{ $transaction->pay }}</div>
                @if ($transaction->status_id == 1)
                    <div class="text-green-600 text-lg font-semibold">Aprobado</div>
                @else
                    <div class="text-red-600 text-lg font-semibold">Pendiente</div>
                @endif
                @if ($transaction->status_id == 2)
                    <form action="{{ route('client.transaction.destroy', ['transaction'=>$transaction]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <x-link-button href="{{ route('product.payment', ['product'=>$transaction->product, 'transaction'=>$transaction]) }}" class="block bg-blue-600">Ver más</x-link-button>
                        <input type="submit" value="cancelar" class="text-gray-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none mr-2  cursor-pointer text-center">
                    </form>
                @else
                    <div class="w-16"></div>
                @endif
            </div>
        @endforeach

    </div>
    <!-- ./wishlist -->
 
 </div>
 <!-- ./account wrapper -->
 </x-app-client-layout>