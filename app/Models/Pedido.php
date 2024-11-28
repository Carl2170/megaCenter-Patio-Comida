<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['carrito_id', 'mesa_id', 'total', 'estado'];

    // Relación inversa uno a muchos con Carrito
    public function carrito()
    {
        return $this->belongsTo(Carrito::class);
    }

    // Relación inversa uno a muchos con Mesa
    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    // Relación muchos a muchos con Productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto')
                    ->withPivot('cantidad', 'subtotal');
    }

}
