<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nome',
    ];

    public function tiposVidro()
    {
        return $this->hasMany('App\TipoVidro', 'id_categoria', 'id');
    }
}
