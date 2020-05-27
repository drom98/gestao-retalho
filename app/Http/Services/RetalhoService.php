<?php


namespace App\Http\Services;


use App\Helpers\Helper;
use App\Retalho;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use function GuzzleHttp\Promise\all;

class RetalhoService
{
    public function store(Request $request)
    {
        $this->validate($request);

        return Retalho::create(
            [
                'usado' => 0,
                'num_lote' => $request->lote,
                'comprimento' => $request->comprimento,
                'largura' => $request->largura,
                'area' => Helper::getArea($request->largura, $request->comprimento),
                'id_tipoVidro' => $request->tipoVidro,
                'id_localizacao' => $request->localizacao,
            ]
        );
    }

    public function update(Request $request, Retalho $retalho)
    {
        $this->validate($request);

        return $retalho->update([
            'num_lote' => $request->lote,
            'comprimento' => $request->comprimento,
            'largura' => $request->largura,
            'id_tipoVidro' => $request->tipoVidro,
            'id_localizacao' => $request->localizacao,
            'area' => Helper::getArea($request->largura, $request->comprimento)
        ]);

    }

    public function getRetalho($id)
    {
        return Retalho::findOrFail($id);
    }

    public function delete($id)
    {
        return Retalho::destroy($id);
    }

    public function getDataTables()
    {
        return Datatables::of(Retalho::where('usado', 0))
            ->addColumn('id_tipoVidro', function ($retalho) {
                return $retalho->TipoVidro->nome;
            })
            ->addColumn('id_localizacao', function ($retalho) {
                return $retalho->Localizacao->nome;
            })
            ->addColumn('id_user', function ($retalho) {
                return $retalho->User->username;
            })
            ->addColumn('created_at', function ($retalho) {
                return Helper::getLocalizedDate($retalho);
            })
            ->addColumn('opcoes', function ($retalho) {
                $btnUsar = '<button data-id="'. $retalho->id .'" onclick="getRetalho('.$retalho->id.')" type="button" class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#modalUsarRetalho"><i class="fas fa-check"></i> Usar</button>';
                $btnEditar = '<a href="/admin/retalho/' . $retalho->id . '/edit" class="btn btn-block btn-sm btn-primary "><i class="fas fa-edit"></i> Editar</a>';
                $btnApagar = '<a href="/admin/retalho/' . $retalho->id . '/delete" class="btn btn-block btn-sm btn-danger "><i class="fas fa-trash"></i> Eliminar</a>';
                return $btnUsar . $btnEditar . $btnApagar;
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }

    private function validate($request)
    {
        return $request->validate([
            'lote' => 'required',
            'comprimento'=> 'required|numeric',
            'largura'=> 'required|numeric',
            'area'=> 'required|numeric|gt:1.0'
        ]);
    }

}
