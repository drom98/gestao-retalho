<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Retalho;
use App\RetalhoUsado;
use App\TipoVidro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'qtRetalho' => DB::table('retalhos')->where('usado', 0)->count(),
            'qtRetalhoUsado' => RetalhoUsado::count(),
            'qtCategorias' => Categoria::count()
        ]);
    }

    public function showRetalho()
    {
        return view('retalho.index');
    }
}
