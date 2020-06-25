<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\RetalhoUsadoService;
use App\RetalhoUsado;
use Illuminate\Http\Request;

class RetalhoUsadoController extends Controller
{

    private $retalhoUsadoService;

    /**
     * RetalhoUsadoController constructor.
     * @param $retalhoUsadoService
     */
    public function __construct(RetalhoUsadoService $retalhoUsadoService)
    {
        $this->retalhoUsadoService = $retalhoUsadoService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.usado.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->retalhoUsadoService->store($request);

        return redirect(route('admin.usado.index'))->with('sucesso', 'Retalho marcado como usado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RetalhoUsado  $retalhoUsado
     * @return \Illuminate\Http\Response
     */
    public function show(RetalhoUsado $retalhoUsado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RetalhoUsado  $retalhoUsado
     * @return \Illuminate\Http\Response
     */
    public function edit(RetalhoUsado $retalhoUsado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RetalhoUsado  $retalhoUsado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RetalhoUsado $retalhoUsado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RetalhoUsado  $retalhoUsado
     * @return \Illuminate\Http\Response
     */
    public function destroy($retalhoUsado)
    {
        RetalhoUsado::destroy($retalhoUsado);

        return redirect(route('admin.usado.index'))->with('sucesso', 'Retalho eliminado.');
    }

    public function getUsado()
    {
        return $this->retalhoUsadoService->getDataTables();
    }
}
