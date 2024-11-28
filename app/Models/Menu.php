<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'local_id'];

    // Relación inversa uno a muchos con Local
    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    // Relación muchos a muchos con Productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'menu_producto');
    }

    // Relación uno a muchos con Promociones
    public function promociones()
    {
        return $this->hasMany(Promocion::class);
    }
}
