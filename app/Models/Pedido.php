<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'comprador_id', 'agricultor_id', 'total_kg', 'total_precio',
        'direccion_entrega', 'telefono_entrega', 'estado'
    ];

    public function comprador() {
        return $this->belongsTo(\App\Models\User::class, 'comprador_id');
    }

    public function agricultor() {
        return $this->belongsTo(User::class, 'agricultor_id');
    }

    public function detalles() {
        return $this->hasMany(\App\Models\DetallePedido::class, 'pedido_id');
    }

    public function postulaciones() {
        return $this->hasMany(PostulacionTransportista::class, 'pedido_id');
    }

    public function transporte() {
        return $this->hasOne(Transporte::class, 'pedido_id');
    }

    public function pago()
    {
        return $this->hasOne(Pago::class, 'pedido_id');
    }
}
