<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\TipoVidro;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TipoVidroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tipoVidro.index')->with('tipos', TipoVidro::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoVidro.create')->with('categorias', Categoria::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TipoVidro::create(
            [
                'nome' => $request->nome
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoVidro  $tipoVidro
     * @return \Illuminate\Http\Response
     */
    public function show(TipoVidro $tipoVidro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoVidro  $tipoVidro
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoVidro $tipoVidro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoVidro  $tipoVidro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoVidro $tipoVidro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoVidro  $tipoVidro
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoVidro $tipoVidro)
    {
        //
    }

    public function getTiposVidro()
    {
        return Datatables::of(TipoVidro::query())->make(true);
    }
}
