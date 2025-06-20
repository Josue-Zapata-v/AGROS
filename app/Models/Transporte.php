<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $fillable = [
        'pedido_id', 'agricultor_id', 'transportista_id', 'fecha_envio',
        'distancia_km', 'total_estimado', 'estado'
    ];

    public function pedido() {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function agricultor() {
        return $this->belongsTo(User::class, 'agricultor_id');
    }

    public function transportista() {
        return $this->belongsTo(User::class, 'transportista_id');
    }
}


