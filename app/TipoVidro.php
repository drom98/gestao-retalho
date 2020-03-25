<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVidro extends Model
{
    protected $table = 'tipos_vidro';

    protected $fillable = [
        'nome',
        'id_categoria',
    ];

    public function categoria()
    {
        return $this->hasOne('App\Categoria', 'id_categoria');
    }

    public function retalhos()
    {
        return $this->hasMany('App\Retalho', 'id_tipoVidro', 'id');
    }
}
