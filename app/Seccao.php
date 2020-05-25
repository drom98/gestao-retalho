<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccao extends Model
{
    protected $table = 'seccoes';

    protected $fillable = [
        'nome'
    ];
}
