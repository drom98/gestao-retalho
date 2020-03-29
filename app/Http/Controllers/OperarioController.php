<?php

namespace App\Http\Controllers;

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
}
