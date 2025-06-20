<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostulacionTransportista extends Model
{
    protected $table = 'postulaciones_transportistas';

    protected $fillable = [
        'pedido_id', 'transportista_id', 'estado', 'mensaje', 'fecha_postulacion'
    ];

    public function pedido() {
        return $this->belongsTo(\App\Models\Pedido::class, 'pedido_id');
    }

    public function transportista() {
        return $this->belongsTo(\App\Models\User::class, 'transportista_id');
    }
}

