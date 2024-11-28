<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio', 'descripcion', 'local_id', 'imagen_url'];

    // Relación inversa uno a muchos con Local
    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    // Relación muchos a muchos con Menús
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_producto');
    }

    // Relación muchos a muchos con Carritos
    public function carritos()
    {
        return $this->belongsToMany(Carrito::class, 'carrito_producto')
                    ->withPivot('cantidad', 'subtotal');
    }

    // Relación muchos a muchos con Pedidos
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_producto')
                    ->withPivot('cantidad', 'subtotal');
    }
}
