<?php


namespace App\Http\Controllers\Admin;


use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Services\RetalhoService;
use App\Localizacao;
use App\Retalho;
use App\Seccao;
use App\TipoVidro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RetalhoController extends Controller
{

    private $retalhoService;

    /**
     * RetalhoController constructor.
     * @param $retalhoService
     */
    public function __construct(RetalhoService $retalhoService)
    {
        $this->retalhoService = $retalhoService;
    }

    public function index()
    {
        return view('admin.retalho.index')->with('seccoes', Seccao::all());
    }

    public function create()
    {
        return view('admin.retalho.create', [
            'tiposVidro' => TipoVidro::all(),
            'localizacoes' => Localizacao::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->retalhoService->store($request);
        return redirect(route('admin.retalho.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retalho  $retalho
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Retalho $retalho)
    {
        return view('admin.retalho.edit', [
            'retalho' => $retalho,
            'tiposVidro' => TipoVidro::all(),
            'localizacoes' => Localizacao::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retalho  $retalho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retalho $retalho)
    {
        $this->retalhoService->update($request, $retalho);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retalho  $retalho
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retalho $retalho)
    {
        dd($retalho);
        return $this->retalhoService->delete($retalho->id);
    }

    public function getViewUsado()
    {
        return view('admin.retalho.usado');
    }

    public function getUsado()
    {
        return DataTables::of(Retalho::where('usado', 1)->get())
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
                $btnApagar = '<a style="margin-left: 6px;" href="/admin/retalho/delete/'. $retalho->id .'" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i> Eliminar</a>';
                return $btnApagar;
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }

    public function getDataTables()
    {
        return $this->retalhoService->getDataTables();
    }

    public function getRetalho($id)
    {
        return $this->retalhoService->getRetalho($id);
    }

    public function usarRetalho($id)
    {
        return $this->retalhoService->usar($id);
    }
}
