<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Localizacao;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LocalizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.localizacao.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.localizacao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Localizacao::create([
            'nome' => $request->nome
        ]);

        return self::index()->with('sucesso', 'Nova localização adicionada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function show(Localizacao $localizacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Localizacao $localizacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Localizacao $localizacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Localizacao $localizacao)
    {
        //
    }

    public function getDataTables()
    {
        return Datatables::of(Localizacao::query())->make(true);
    }
}
