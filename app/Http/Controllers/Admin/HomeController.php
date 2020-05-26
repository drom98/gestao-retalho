<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Retalho;
use App\RetalhoUsado;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('admin.home', [
            'qtRetalho' => Retalho::count(),
            'qtRetalhoUsado' => RetalhoUsado::count(),
            'qtCategorias' => Categoria::count()
        ]);
    }

    public function showRetalho()
    {
        return view('retalho.index');
    }
}
