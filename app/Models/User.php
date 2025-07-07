<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'precio_transporte_kg',
        'departamento',
        'provincia',
        'distrito',
        'direccion_detallada'
    ];

    public function productos() {
        return $this->hasMany(Producto::class, 'agricultor_id');
    }

    public function pedidosComprador() {
        return $this->hasMany(Pedido::class, 'comprador_id');
    }

    public function pedidosAgricultor() {
        return $this->hasMany(Pedido::class, 'agricultor_id');
    }

    public function postulaciones() {
        return $this->hasMany(PostulacionTransportista::class, 'transportista_id');
    }

    public function transportesRealizados() {
        return $this->hasMany(Transporte::class, 'transportista_id');
    }
}
