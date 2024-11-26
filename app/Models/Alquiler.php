<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;

    protected $fillable = ['local_id', 'monto_mensual', 'fecha_vencimiento', 'estado'];

    // Relación inversa uno a uno con Local
    public function local()
    {
        return $this->belongsTo(Local::class);
    }
}
