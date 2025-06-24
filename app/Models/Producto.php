<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre', 'descripcion', 'precio', 'stock', 'imagen', 'caracteristicas',
        'ubicacion', 'agricultor_id', 'min_kg_envio', 'max_kg_envio'
    ];

    public function agricultor() {
        return $this->belongsTo(User::class, 'agricultor_id');
    }

    public function detallesPedido() {
        return $this->hasMany(DetallePedido::class, 'producto_id');
    }

    public function categorias() {
        return $this->belongsToMany(Categoria::class, 'categoria_producto');
    }
}
