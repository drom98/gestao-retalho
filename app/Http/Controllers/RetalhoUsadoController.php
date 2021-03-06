<?php

namespace App\Http\Controllers;

use App\Http\Services\RetalhoUsadoService;
use App\RetalhoUsado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //return view('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->retalhoUsadoService->store($request, Auth::id(), 'App\User');

        return redirect(route('home'))->with('sucesso', 'Retalho marcado como usado.');
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
    public function destroy(RetalhoUsado $retalhoUsado)
    {
        //
    }
}
