<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'tipo', 'locatario_id', 'estado'];

    // Relación inversa uno a muchos con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'locatario_id');
    }

    // Relación uno a muchos con Productos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    // Relación uno a muchos con Menús
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    // Relación uno a uno con Alquiler
    public function alquiler()
    {
        return $this->hasOne(Alquiler::class);
    }

    // Relación uno a muchos con Promociones
    public function promociones()
    {
        return $this->hasMany(Promocion::class);
    }

    // Relación uno a muchos con Mesas
    public function mesas()
    {
        return $this->hasMany(Mesa::class);
    }
}
