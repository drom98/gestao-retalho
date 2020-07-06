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
        'id_seccao',
        'id_retalho',
        'retalhable_id',
        'retalhable_type',
    ];

    public function retalhable()
    {
        return $this->morphTo();
    }

    public function retalho()
    {
        return $this->belongsTo('App\Retalho', 'id_retalho');
    }

    public function seccao()
    {
        return $this->belongsTo('App\Seccao', 'id_seccao');
    }
}
