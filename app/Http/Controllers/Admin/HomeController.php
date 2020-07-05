<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\ChartService;
use App\Localizacao;
use App\Retalho;
use App\RetalhoUsado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    private $chartService;

    /**
     * Only guests for "admin" guard are allowed except
     * for logout.
     *
     * @return void
     */
    public function __construct(ChartService $chartService)
    {
        $this->middleware('auth:admin')->except('logout');
        $this->chartService = $chartService;
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.home', [
            'qtRetalho' => DB::table('retalhos')->where('deleted_at', null)->count(),
            'qtRetalhoUsado' => RetalhoUsado::count(),
            'qtLocalizacoes' => Localizacao::count(),
            'chartRetalhosPorTipoVidro' => $this->chartService->chartRetalhosPorTipoVidro(),
            'chartRetalhosPorLocalizacao' => $this->chartService->chartRetalhosPorLocalizacao()
        ]);
    }

    public function showRetalho()
    {
        return view('retalho.index');
    }
}
