<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    // Especifica la tabla si no sigue la convención (opcional en este caso)
    protected $table = 'pagos';

    // Habilita asignación masiva de los siguientes campos
    protected $fillable = [
        'pedido_id',
        'metodo_pago',
        'monto',
        'fecha_pago',
    ];

    // Si tu tabla usa timestamps (created_at, updated_at), déjalo activado
    public $timestamps = true;

    // Relación: Un pago pertenece a un pedido
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
