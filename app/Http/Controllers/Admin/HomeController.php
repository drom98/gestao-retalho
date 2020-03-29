<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Retalho;
use App\TipoVidro;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Only guests for "admin" guard are allowed except
     * for logout.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout');
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('dashboard.dashboard', [
            'qtRetalho' => Retalho::count(),
            'qtTiposVidro' => TipoVidro::count(),
            'qtCategorias' => Categoria::count()
        ]);
    }
}
