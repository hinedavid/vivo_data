<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $table = 'lotes';
    protected $primarykey = "idlote";
    
    public $timestamps = true;
    
    protected $fillable = [
        'date',
        'numero_lote',
        'cantidad'
    ];
}
