<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primarykey = "idproducto";

    public $timestamps = true;

    protected $fillable = [
        'nombre'
    ];

    /*Relación muchos a uno: Varios productos tiene un proveedor*/
    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }
}
