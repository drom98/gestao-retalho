<?php

namespace App\Http\Controllers;

use App\Localizacao;
use App\Retalho;
use App\Services\RetalhoService;
use App\TipoVidro;
use Illuminate\Http\Request;

class OperarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function home()
    {
        return view('operario.index');
    }

    public function consultarRetalho()
    {
        return view('operario.retalho.index');
    }

    public function adicionarRetalho()
    {
        return view('operario.retalho.create', [
            'tiposVidro' => TipoVidro::all(),
            'localizacoes' => Localizacao::all()
        ]);
    }
}
