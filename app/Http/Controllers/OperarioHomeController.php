<?php

namespace App\Http\Controllers;

use App\Operario;
use Illuminate\Http\Request;

class OperarioHomeController extends Controller
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
        return view('operario.home');
    }
}
