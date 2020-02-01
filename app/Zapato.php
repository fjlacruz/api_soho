<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zapato extends Model
{
    protected $table = 'zapatos';
    protected $fillable = [
      	'descripcion',
        'marca',
        'color',
        'stock'
    ];
}
