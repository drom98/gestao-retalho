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
use Illuminate\Support\Facades\Auth;
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
        $this->retalhoService->store($request, Auth::id(), 'App\Admin');

        $link = '<br><a target="_blank" class="alert-link" href="'. route('etiqueta', ['id' => Retalho::orderBy('created_at', 'desc')->firstOrFail()]) .'">Gerar etiqueta</a>';

        return redirect(route('admin.retalho.index'))->with('sucesso', 'Retalho adicionado.' . $link);
    }

    public function show(Retalho $retalho)
    {
        return view('admin.retalho.show')->with('retalho', $retalho);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Retalho $retalho)
    {
        $this->retalhoService->update($request, $retalho);

        return redirect(route('admin.retalho.index'))->with('sucesso', 'Retalho atualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retalho  $retalho
     * @return \Illuminate\Http\Response
     */
    public function destroy($retalho, Request $request)
    {
        $retalho = Retalho::findOrFail($retalho);

        try {
            Retalho::destroy($retalho->id);
        } catch (\Exception $e) {
            return $request->session()->flash('erro', 'Erro ao eliminar retalho.');
        }

        $link = '<br><a class="alert-link" href="'. route('admin.retalho.eliminado') .'">Ver retalhos eliminados</a>';

        return $request->session()->flash('sucesso', 'Retalho eliminado. ' . $link);
    }

    public function deletePerma($retalho, Request $request)
    {
        $retalho = Retalho::onlyTrashed()->where('id', $retalho);

        try {
            $retalho->forceDelete();
        } catch (\Exception $e) {
            return $request
                ->session()
                ->flash('erro', 'O retalho que pretende eliminar tem outros retalhos associados. <br> (erro: ' . $e->getCode() .')');
        }

        return $request->session()->flash('sucesso', 'Retalho eliminado permanentemente.');
    }

    public function restore($retalho, Request $request)
    {
        $retalho = Retalho::onlyTrashed()->where('id', $retalho);
        $retalho->restore();

        $link = '<br><a class="alert-link" href="'. route('admin.retalho.index') .'">Ver retalhos disponíveis</a>';

        return $request->session()->flash('sucesso', 'Retalho restaurado. ' . $link);
    }

    public function getViewEliminado()
    {
        return view('admin.retalho.deleted');
    }

    public function getEliminado()
    {
        return $this->retalhoService->getEliminado();
    }

    public function getDTEliminado()
    {
        return $this->retalhoService->getDTEliminado();
    }

    public function getViewUsado()
    {
        return view('admin.retalho.usado');
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

    public function gerarEtiqueta($id)
    {
        return $this->retalhoService->gerarEtiqueta($id);
    }
}
