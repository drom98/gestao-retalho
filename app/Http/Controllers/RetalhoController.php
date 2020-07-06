<?php

namespace App\Http\Controllers;

use App\Http\Services\RetalhoService;
use App\Localizacao;
use App\Retalho;
use App\Seccao;
use App\TipoVidro;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('operario.retalho.index', [
            'retalho' => Retalho::all(),
            'seccoes' => Seccao::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operario.retalho.create', [
            'tiposVidro' => TipoVidro::all(),
            'localizacoes' => Localizacao::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->retalhoService->store($request, Auth::id(), 'App\User');

        return redirect(route('retalho.index'))->with('sucesso', 'Retalho adicionado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Retalho  $retalho
     * @return \Illuminate\Http\Response
     */
    public function show(Retalho $retalho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retalho  $retalho
     * @return \Illuminate\Http\Response
     */
    public function edit(Retalho $retalho)
    {
        return view('operario.retalho.edit', [
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

        return redirect(route('retalho.index'))->with('sucesso', 'Retalho Nº'.$retalho->id.' atualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retalho  $retalho
     * @return \Illuminate\Http\Response
     */
    public function destroy($retalho)
    {
        $retalho = Retalho::findOrFail($retalho);
        $this->retalhoService->delete($retalho->id);

        return redirect(route('retalho.index'))->with('sucesso', 'Retalho eliminado.');
    }

    public function getRetalho()
    {
        return $this->retalhoService->getDataTablesOperario();
    }

    public function getRetalhoById($id)
    {
        return $this->retalhoService->getRetalho($id);
    }
}
