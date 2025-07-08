<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AgregarCarritoRequest;
use App\Models\Producto;    // ← Importa Producto
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\DetallePedido; // Asegúrate de importar el modelo
use App\Models\Pago;
class CarritoController extends Controller
{
    public function index()
    {


        if (Auth::check() && Auth::user()->role !== 'comprador') {
            $rol = Auth::user()->role;

            // Redirige al dashboard correspondiente según el rol
            if ($rol === 'agricultor') {
                return redirect()->route('agricultor.dashboard')->with('error', 'Solo los compradores pueden acceder al carrito.');
            } elseif ($rol === 'transportista') {
                return redirect()->route('transportista.dashboard')->with('error', 'Solo los compradores pueden acceder al carrito.');
            } else {
                return redirect('/')->with('error', 'Acceso no autorizado.');
            }
        }
        
        $carrito = session()->get('carrito', []);
        return view('publico.carrito.index', compact('carrito'));
    }

    public function agregar(AgregarCarritoRequest $request)
    {
        $producto  = Producto::with('agricultor')->findOrFail($request->producto_id);
        $cantidad  = $request->cantidad;

        $this->addToCart($producto, $cantidad);

        // Si es una petición AJAX (fetch desde JavaScript)
        if ($request->expectsJson()) {
            $carrito = session('carrito', []);
            $totalItems = count($carrito); // cantidad de productos únicos

            return response()->json([
                'success' => true,
                'message' => 'Producto agregado al carrito',
                'total_items' => $totalItems
            ]);
        }

        // Si es una petición normal (formulario tradicional)
        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }   

    
    public function actualizarCantidad(Request $request)
    {
        $carrito = session()->get('carrito', []);
        $id      = $request->producto_id;

        // Validar existencia del producto en el carrito
        if (!isset($carrito[$id])) {
            return response()->json(['error' => 'Producto no en carrito'], 404);
        }

        // Validación para los dos escenarios
        if ($request->has('accion')) {
            $request->validate([
                'producto_id' => 'required|exists:productos,id',
                'accion'      => 'required|in:incrementar,disminuir',
            ]);

            if ($request->accion === 'incrementar') {
                $carrito[$id]['cantidad']++;
            } else {
                $carrito[$id]['cantidad']--;
                if ($carrito[$id]['cantidad'] < 1) {
                    unset($carrito[$id]);
                }
            }
        } elseif ($request->has('cantidad_manual')) {
            $request->validate([
                'producto_id'     => 'required|exists:productos,id',
                'cantidad_manual' => 'required|integer|min:1',
            ]);

            $carrito[$id]['cantidad'] = $request->cantidad_manual;
        } else {
            return response()->json(['error' => 'Petición inválida'], 400);
        }

        // Guardar en sesión
        session()->put('carrito', $carrito);

        // Recalcular totales
        $totalKg     = array_sum(array_column($carrito, 'cantidad'));
        $totalPrecio = array_sum(array_map(fn($i) => $i['cantidad'] * $i['precio'], $carrito));

        // Subtotal del ítem actualizado
        $subtotal = isset($carrito[$id])
            ? $carrito[$id]['cantidad'] * $carrito[$id]['precio']
            : 0;

        return response()->json([
            'cantidad'   => $carrito[$id]['cantidad'] ?? 0,
            'subtotal'   => number_format($subtotal, 2, '.', ''),
            'totalKg'    => $totalKg,
            'totalPrice' => number_format($totalPrecio, 2, '.', ''),
        ]);
    }
    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);
        unset($carrito[$id]);
        session(['carrito' => $carrito]);

        return back()->with('success', 'Producto eliminado del carrito.');
    }

    /**
    * Guarda los datos de entrega en sesión y redirige a confirmación.
    */
    public function guardarEntrega(Request $request)
    {
        $data = $request->validate([
            'telefono_entrega' => 'required|string|max:20',
            'calle'            => 'required|string|max:150',
            'distrito'         => 'required|string|max:100',
            'provincia'        => 'required|string|max:100',
            'referencias'      => 'nullable|string|max:255',
            'metodo_pago' => 'required|in:tarjeta,transferencia,efectivo',

        ]);

        // Concatenamos en un solo string para la tabla pedidos
        $direccion = "{$data['calle']}, {$data['distrito']}, {$data['provincia']}";
        if (!empty($data['referencias'])) {
            $direccion .= " (Ref: {$data['referencias']})";
        }

        // Guardamos en sesión para usar en el Paso 3
        session([
            'entrega.telefono'   => $data['telefono_entrega'],
            'entrega.direccion'  => $direccion,
        ]);
        $carrito = session()->get('carrito', []);

        $totalKg = array_sum(array_column($carrito, 'cantidad'));
        $totalPrecio = array_sum(array_map(fn($item) => $item['cantidad'] * $item['precio'], $carrito));

        $agricultorId = reset($carrito)['agricultor_id'] ?? null;

        $pedido = Pedido::create([
            'comprador_id'       => auth()->id(),
            'agricultor_id'      => $agricultorId, // ← lo defines según tu lógica
            'total_kg'           => $totalKg,
            'total_precio'       => $totalPrecio,
            'direccion_entrega'  => session('entrega.direccion'),
            'telefono_entrega'   => session('entrega.telefono'), // ← esta es la clave
        ]);
        
        Pago::create([
            'pedido_id' => $pedido->id,
            'metodo_pago' => $request->metodo_pago,
            'monto' => $totalPrecio,
            'fecha_pago' => now(),
        ]);
        
        // Validar stock de cada producto ANTES de crear los detalles del pedido
        foreach ($carrito as $item) {
            $producto = Producto::findOrFail($item['id']);

            if ($item['cantidad'] > $producto->stock) {
                return redirect()->route('carrito.index')->with('error', "El producto '{$producto->nombre}' no tiene suficiente stock. Disponible: {$producto->stock} kg.");
            }
        }

        foreach ($carrito as $item) {
            $producto = Producto::findOrFail($item['id']);

            // Crear detalle del pedido
            DetallePedido::create([
                'pedido_id'      => $pedido->id,
                'producto_id'    => $item['id'],
                'cantidad'       => $item['cantidad'],
                'precio_unitario'=> $item['precio'],
            ]);

            // Descontar stock
            $producto->stock -= $item['cantidad'];
            $producto->save();
        }      

        // Vaciar el carrito y su contador
        session()->forget('carrito');
        session()->forget('contador_carrito'); // ← si usas un contador separado
        session(['entrega.metodo_pago' => $request->metodo_pago]);

        // Guardamos el ID del pedido en la sesión para mostrarlo en el paso de confirmación
        session(['ultimo_pedido_id' => $pedido->id]);
        return redirect()->route('carrito.confirmacion');
    }

    public function confirmarPedido()
    {
        $pedido = Pedido::with('detalles.producto', 'pago') // 👈 Cargar detalles y productos
            ->where('comprador_id', auth()->id())
            ->latest()
            ->first();

        if (!$pedido) {
            return redirect()->route('carrito.index')->with('error', 'No se encontró el pedido más reciente.');
        }

        // Construir número personalizado del pedido
        $numeroPedido = 'AGR-' . now()->format('Y') . '-' . str_pad($pedido->id, 3, '0', STR_PAD_LEFT);

        return view('publico.carrito.confirmacion', [
            'pedido' => $pedido,
            'numeroPedido' => $numeroPedido,
        ]);
    }


    // Método privado para añadir al carrito
    private function addToCart(Producto $producto, int $cantidad): void
    {
        $cart = session()->get('carrito', []);

        $id   = $producto->id;
        
        $effectiveMax = min($producto->max_kg_envio, $producto->stock);
        $finalQty = min(max($cantidad, $producto->min_kg_envio), $effectiveMax);
        $item = [
            'id'         => $id,
            'nombre'     => $producto->nombre,
            'precio'     => $producto->precio,
            'cantidad'   => $finalQty,
            'imagen'     => $producto->imagen 
                               ? asset("storage/{$producto->imagen}") 
                               : null,
            'agricultor' => $producto->agricultor->name ?? 'Productor',
            'agricultor_id' => $producto->agricultor_id,  // 👈 AGREGA ESTA LÍNEA
            // 🔽 Agrega estos tres campos para el frontend JS
            'stock'           => $producto->stock,
            'min_kg_envio'    => $producto->min_kg_envio,
            'max_kg_envio'    => $producto->max_kg_envio,

        ];

        

        $cart[$id] = $item;
        session()->put('carrito', $cart);
    }

    public static function totalItems()
    {
        return count(session('carrito', []));
    }

}
