<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;
use Yajra\DataTables\DataTables;

class OperarioController extends Controller
{
    public function index()
    {
        return view('admin.operario.index');
    }

    public function getDataTables()
    {
        return Datatables::of(User::query())->make(true);
    }
}
