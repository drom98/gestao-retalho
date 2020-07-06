<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retalho extends Model
{
    use SoftDeletes;

    protected $table = 'retalhos';

    protected $fillable = [
        'num_lote',
        'comprimento',
        'largura',
        'area',
        'id_tipoVidro',
        'id_localizacao',
        'retalhable_id',
        'retalhable_type'
    ];

    public function retalhable()
    {
        return $this->morphTo();
    }

    public function tipoVidro()
    {
        return $this->belongsTo('App\TipoVidro', 'id_tipoVidro');
    }

    public function localizacao()
    {
        return $this->belongsTo('App\Localizacao', 'id_localizacao');
    }

    public function usados()
    {
        return $this->hasMany('App\RetalhoUsado', 'id', 'id_retalho');
    }
}
