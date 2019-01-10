<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $primarykey = "idproveedor";

    public $timestamps = true;

    protected $fillable = [
        'nombre'
    ];

    /*Relación uno a muchos: Un provedoor tiene muchos productos*/
    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
