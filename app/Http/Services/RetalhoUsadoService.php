<?php


namespace App\Http\Services;


use App\Helpers\Helper;
use App\Retalho;
use App\RetalhoUsado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class RetalhoUsadoService
{
    public function store(Request $request)
    {
        $retalho = Retalho::find($request->id_retalho);

        $request->validate([
            'comprimento' => ['required', 'lte:' . $retalho->comprimento],
            'largura' => ['required', 'lte:' . $retalho->largura],
            'num_of' => ['required'],
        ]);

        $area = ($request->largura * $request->comprimento)/1000000;

        RetalhoUsado::create([
            'comprimento' => $request->comprimento,
            'largura' => $request->largura,
            'area' => $area,
            'ref_obra' => $request->ref_obra,
            'num_of' => $request->num_of,
            'obs' => $request->obs,
            'id_seccao' => $request->seccao,
            'id_retalho' => $retalho->id,
            'id_user' => Auth::id()
        ]);

        $retalho->usado = 1;
        $retalho->save();
    }

    public function getDataTables()
    {
        return DataTables::of(RetalhoUsado::query()->orderBy('created_at', 'desc'))
            ->addColumn('id_tipoVidro', function ($retalho) {
                return $retalho->Retalho->TipoVidro->nome;
            })
            ->addColumn('id_localizacao', function ($retalho) {
                return $retalho->Retalho->Localizacao->nome;
            })
            ->addColumn('id_user', function ($retalho) {
                return $retalho->User->username;
            })
            ->addColumn('id_seccao', function ($retalho) {
                return $retalho->Seccao->nome;
            })
            ->addColumn('created_at', function ($retalho) {
                return Helper::getLocalizedDate($retalho);
            })
            ->addColumn('opcoes', function ($retalho) {
                $btnApagar = '<a style="margin-left: 6px;" href="/admin/retalho/delete/'. $retalho->id .'" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i> Eliminar</a>';
                return $btnApagar;
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }
}
