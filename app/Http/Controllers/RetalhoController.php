<?php

namespace App\Http\Controllers;

use App\Localizacao;
use App\Retalho;
use App\TipoVidro;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RetalhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retalho = Retalho::all();
        return view('retalho.index', [
            'retalho' => $retalho
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('retalho.create', [
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
        $this->validar($request);

        $area = ($request->largura * $request->comprimento)/1000000;

        Retalho::create(
            [
                'lote' => $request->lote,
                'comprimento' => $request->comprimento,
                'largura' => $request->largura,
                'area' => $area,
                'id_tipoVidro' => $request->tipoVidro,
                'id_localizacao' => $request->localizacao
            ]
        );

        return self::index()->with('sucesso', 'Novo retalho adicionado.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retalho  $retalho
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retalho $retalho)
    {
        //
    }

    private function validar(Request $request)
    {
        return $this->validate($request, [
            'comprimento'=> 'required|numeric',
            'largura'=> 'required|numeric',
            'area'=> 'required|numeric|gt:0.4'
        ]);
    }

    public function getRetalho()
    {
        return Datatables::of(Retalho::query())->make(true);
    }
}
