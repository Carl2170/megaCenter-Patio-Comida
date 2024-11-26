<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'tipo_pago', 'monto', 'concepto_id', 'tipo_concepto', 'fecha', 'estado'];

    // Relación inversa uno a muchos con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
