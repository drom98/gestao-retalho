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
        return Datatables::of(User::query())
            ->addColumn('created_at', function ($user) {
                return $user->created_at->format('d M Y');
            })
            ->addColumn('opcoes', function ($user) {
                $btnEditar = '<a style="margin-left: 6px;" href="/admin/operario/' . $user->id . '/edit" class="btn btn-sm btn-primary "><i class="fas fa-edit"></i> Editar</a>';
                $btnApagar = '<a style="margin-left: 6px;" href="/admin/operario/' . $user->id . '/edit" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i> Eliminar</a>';
                return $btnEditar . $btnApagar;
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }
}
