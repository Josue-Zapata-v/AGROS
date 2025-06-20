<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedido'; // 👈 Corrige el nombre real de la tabla
    public $timestamps = false;


    protected $fillable = [
        'pedido_id', 'producto_id', 'cantidad', 'precio_unitario'
    ];

    public function pedido() {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function producto() {
        return $this->belongsTo(\App\Models\Producto::class, 'producto_id');
    }
}
