<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'descuento', 'fecha_inicio', 'fecha_fin', 'local_id'];

    // Relación inversa uno a muchos con Local
    public function local()
    {
        return $this->belongsTo(Local::class);
    }
}
