<?php


namespace App\Http\Services;


use App\Retalho;
use App\RetalhoUsado;
use Illuminate\Http\Request;

class RetalhoUsadoService
{
    public function store(Request $request)
    {
        $retalho = Retalho::find($request->id_retalho);

        $area = ($request->largura * $request->comprimento)/1000000;

        RetalhoUsado::create([
            'comprimento' => $request->comprimento,
            'largura' => $request->largura,
            'area' => $area,
            'ref_obra' => $request->ref_obra,
            'num_of' => $request->num_of,
            'obs' => $request->obs,
            'id_seccao' => $request->seccao,
            'id_retalho' => $retalho->id
        ]);

        $retalho->usado = 1;
        $retalho->save();
    }
}
