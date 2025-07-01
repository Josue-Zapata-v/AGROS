@php
    use App\Http\Controllers\CarritoController;
    $total = CarritoController::totalItems();
@endphp

<a href="{{ route('carrito.index') }}"
   class="flex items-center border border-green-800 rounded px-3 py-1 hover:bg-green-800 hover:text-white transition-colors">
   <i class="fas fa-shopping-cart mr-2"></i>
   Mi Carrito (
     <span id="contador-carrito">{{ $total }}</span>
   )
</a>
