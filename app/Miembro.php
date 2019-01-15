<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    protected $table = 'miembros';
    protected $primarykey = "idmiembro";

    public $timestamps = true;

    protected $fillable = [
        'nombre'
    ];
}
