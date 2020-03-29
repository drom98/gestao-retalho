<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Retalho;
use App\TipoVidro;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //dd('area admin');
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home', [
            'qtRetalho' => Retalho::count(),
            'qtTiposVidro' => TipoVidro::count(),
            'qtCategorias' => Categoria::count()
        ]);
    }
}
