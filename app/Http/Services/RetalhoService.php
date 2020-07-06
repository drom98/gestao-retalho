<?php


namespace App\Http\Services;


use App\Helpers\Helper;
use App\Retalho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use function GuzzleHttp\Promise\all;

class RetalhoService
{
    public function store(Request $request)
    {
        $this->validate($request);

        return Retalho::create(
            [
                'num_lote' => $request->lote,
                'comprimento' => $request->comprimento,
                'largura' => $request->largura,
                'area' => Helper::getArea($request->largura, $request->comprimento),
                'id_tipoVidro' => $request->tipoVidro,
                'id_localizacao' => $request->localizacao,
                'id_user' => Auth::id()
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

    public function getDataTables()
    {
        return Datatables::of(Retalho::where('deleted_at', null)->orderBy('created_at', 'desc'))
            ->addColumn('tipoVidro', function ($retalho) {
                return $retalho->TipoVidro->nome;
            })
            ->addColumn('localizacao', function ($retalho) {
                return $retalho->Localizacao->nome;
            })
            ->addColumn('user', function ($retalho) {
                return $retalho->User->username;
            })
            ->addColumn('created_at', function ($retalho) {
                return Helper::getLocalizedDate($retalho);
            })
            ->addColumn('opcoes', function ($retalho) {
                $btnUsar = '<button data-id="'. $retalho->id .'" onclick="getRetalho('.$retalho->id.')" type="button" class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#modalUsarRetalho"><i class="fas fa-check"></i> Usar</button>';
                $btnEditar = '<a href="/admin/retalho/' . $retalho->id . '/edit" class="btn btn-block btn-sm btn-primary "><i class="fas fa-edit"></i> Editar</a>';
                $btnApagar = '<button class="btn btn-block btn-sm btn-danger" onclick="fecthDelete(' . $retalho->id . ', ' . "'/admin/retalho/'" . ', '. "'DELETE'" .')"><i class="fas fa-trash"></i> Eliminar</button>';
                return $btnUsar . $btnEditar . $btnApagar;
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }

    public function getDTEliminado()
    {
        return Datatables::of(Retalho::onlyTrashed()->get())
            ->addColumn('tipoVidro', function ($retalho) {
                return $retalho->TipoVidro->nome;
            })
            ->addColumn('localizacao', function ($retalho) {
                return $retalho->Localizacao->nome;
            })
            ->addColumn('user', function ($retalho) {
                return $retalho->User->username;
            })
            ->addColumn('created_at', function ($retalho) {
                return Helper::getLocalizedDate($retalho);
            })
            ->addColumn('opcoes', function ($retalho) {
                $btnRestaurar = '<button class="btn btn-block btn-sm btn-success" onclick="fecthDelete(' . $retalho->id . ', ' . "'/admin/retalho/eliminado/restore/'" . ', '. "'GET'" .')"><i class="fas fa-check"></i> Restaurar</button>';
                $btnApagar = '<button class="btn btn-block btn-sm btn-danger" onclick="fecthDelete(' . $retalho->id . ', ' . "'/admin/retalho/eliminado/'" . ', '. "'GET'" .')"><i class="fas fa-trash"></i> Eliminar</button>';
                return $btnRestaurar . $btnApagar;
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }

    public function getDataTablesOperario()
    {
        return Datatables::of(Retalho::where('deleted_at', null)->orderBy('created_at', 'desc'))
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
                $btnEditar = '<a href="/retalho/' . $retalho->id . '/edit" class="btn btn-block btn-sm btn-primary "><i class="fas fa-edit"></i> Editar</a>';
                $btnApagar = '<button class="btn btn-block btn-sm btn-danger" onclick="fecthDelete(' . $retalho->id . ', ' . "'/retalho/'" . ', '. "'DELETE'" .')"><i class="fas fa-trash"></i> Eliminar</button>';
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
