<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'local_id'];

    // Relación inversa uno a muchos con Local
    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    // Relación uno a muchos con Pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
