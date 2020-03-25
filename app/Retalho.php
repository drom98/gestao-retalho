<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retalho extends Model
{
    protected $table = 'retalhos';

    protected $fillable = [
        'num_lote',
        'comprimento',
        'largura',
        'area',
        'id_tipoVidro',
        'id_localizacao',
        'num_of',
    ];

    public function tipoVidro()
    {
        return $this->belongsTo('App\TipoVidro', 'id_tipoVidro');
    }

    public function localizacao()
    {
        return $this->belongsTo('App\Localizacao', 'id_localizacao');
    }
}
