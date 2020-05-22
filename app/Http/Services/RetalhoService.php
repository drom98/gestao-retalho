<?php


namespace App\Http\Services;


use App\Retalho;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RetalhoService
{
    public function store(Request $request)
    {
        $request->validate([
            'lote' => 'required|numeric',
            'num_of' => 'required|numeric',
            'comprimento'=> 'required|numeric',
            'largura'=> 'required|numeric',
            'area'=> 'required|numeric|gt:0.4'
        ]);

        $area = ($request->largura * $request->comprimento)/1000000;

        return Retalho::create(
            [
                'num_lote' => $request->lote,
                'num_of' => $request->num_of,
                'comprimento' => $request->comprimento,
                'largura' => $request->largura,
                'area' => $area,
                'id_tipoVidro' => $request->tipoVidro,
                'id_localizacao' => $request->localizacao
            ]
        );
    }

    public function getDataTables()
    {
        return Datatables::of(Retalho::query())
            ->addColumn('id_tipoVidro', function ($retalho) {
                return $retalho->TipoVidro->nome;
            })
            ->addColumn('id_localizacao', function ($retalho) {
                return $retalho->Localizacao->nome;
            })
            ->addColumn('created_at', function ($retalho) {
                return $retalho->created_at->format('d M Y');
            })
            ->addColumn('opcoes', function ($retalho) {
                $btnUsar = '<a href="/admin/retalho/' . $retalho->id . '/edit" class="btn btn-sm btn-success "><i class="fas fa-check"></i> Usar</a>';
                $btnEditar = '<a style="margin-left: 6px;" href="/admin/retalho/' . $retalho->id . '/edit" class="btn btn-sm btn-primary "><i class="fas fa-edit"></i> Editar</a>';
                $btnApagar = '<a style="margin-left: 6px;" href="/admin/retalho/' . $retalho->id . '/edit" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i> Eliminar</a>';
                return $btnUsar . $btnEditar . $btnApagar;
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }


}
