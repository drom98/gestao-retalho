<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetalhoUsado extends Model
{
    protected $table = 'retalho_usados';

    protected $fillable = [
        'comprimento',
        'largura',
        'area',
        'ref_obra',
        'num_of',
        'obs',
        'id_seccao'
    ];
}
