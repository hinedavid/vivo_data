<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $table = 'entregas';
    protected $primarykey = 'identrega';

    public $timestamps = true;

    protected $fillable = [
        'cantidad'
    ];
}
