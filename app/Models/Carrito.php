<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $fillable = ['consumidor_id', 'local_id', 'estado'];

    // Relación inversa uno a muchos con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'consumidor_id');
    }

    // Relación inversa uno a muchos con Local
    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    // Relación muchos a muchos con Productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'carrito_producto')
                    ->withPivot('cantidad', 'subtotal');
    }
}
