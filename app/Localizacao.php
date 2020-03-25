<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    protected $table = 'localizacoes';

    protected $fillable = [
        'nome',
    ];

    public function retalhos()
    {
        return $this->hasMany('App\Retalho', 'id_localizacao', 'id');
    }
}
