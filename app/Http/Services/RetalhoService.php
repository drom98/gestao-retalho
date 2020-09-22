<?php


namespace App\Http\Services;


use App\Helpers\Helper;
use App\Retalho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use function GuzzleHttp\Promise\all;
use PDF;

class RetalhoService
{

    public function gerarEtiqueta($id)
    {
        $retalho = $this->getRetalho($id);

        $pdf = PDF::loadView('pdf.guia.guia', [
            'retalho' => $retalho
        ]);
        
        $name = 'etiqueta-' . $retalho->num_lote . '-' . date('dmyHi') . '.pdf';

        return $pdf->setPaper('A6')->stream($name);
    }

    public function store(Request $request, $user_id, $model)
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
                'retalhable_id' => $user_id,
                'retalhable_type' => $model,
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
        return Datatables::of(Retalho::orderBy('created_at', 'desc')->get())
            ->addColumn('tipoVidro', function ($retalho) {
                return $retalho->TipoVidro->nome;
            })
            ->addColumn('localizacao', function ($retalho) {
                return $retalho->Localizacao->nome;
            })
            ->addColumn('user', function ($retalho) {
                return $retalho->retalhable->name;
            })
            ->addColumn('created_at', function ($retalho) {
                return Helper::getLocalizedDate($retalho);
            })
            ->addColumn('opcoes', function ($retalho) {
                $btnShow = '<a href="/admin/retalho/' . $retalho->id . '" style="justify-content: flex-start;" class="btn btn-block btn-sm btn-primary btn-icon-split"><span class="icon"><i class="far fa-file-alt"></i></span><span class="text"> Ver</span></a>';
                $btnUsar = '<button data-id="'. $retalho->id .'" onclick="getRetalho('.$retalho->id.')" style="justify-content: flex-start;" type="button" class="btn btn-sm btn-block btn-secondary btn-icon-split" data-toggle="modal" data-target="#modalUsarRetalho"><span class="icon"><i class="fas fa-check"></i></span><span class="span text"> Usar</span></button>';
                $btnEditar = '<a href="/admin/retalho/' . $retalho->id . '/edit" style="justify-content: flex-start;" class="btn btn-block btn-sm btn-secondary btn-icon-split"><span class="icon"><i class="fas fa-edit"></i></span><span class="text"> Editar</span></a>';
                $btnApagar = '<button style="justify-content: flex-start;" class="btn btn-block btn-sm btn-secondary btn-icon-split" onclick="fecthDelete(' . $retalho->id . ', ' . "'/admin/retalho/'" . ', '. "'DELETE'" .')"><span class="icon"><i class="far fa-trash-alt"></i></span><span class="text"> Eliminar</span></button>';
                return $btnShow . $btnUsar . $btnEditar . $btnApagar;
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
                return $retalho->retalhable->name;
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
        return Datatables::of(Retalho::orderBy('created_at', 'desc')->get())
            ->addColumn('id_tipoVidro', function ($retalho) {
                return $retalho->TipoVidro->nome;
            })
            ->addColumn('id_localizacao', function ($retalho) {
                return $retalho->Localizacao->nome;
            })
            ->addColumn('id_user', function ($retalho) {
                return $retalho->retalhable->name;
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
