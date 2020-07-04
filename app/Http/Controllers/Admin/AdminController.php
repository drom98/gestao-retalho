<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Admin::create([
            'name' => $request->nome,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect(route('admin.administrador.index'))->with('sucesso', 'Administrador adicionado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($admin)
    {
        $admin = Admin::findOrFail($admin);

        return view('admin.users.admins.edit')->with('admin', $admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $admin)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'email' => 'required|unique:admins'
        ]);

        if ($request->password == null) {
            $password = $request->password_old;
        } else {
            $password = Hash::make($request->password);
        }

        $admin = Admin::findOrFail($admin);

        $admin->update([
            'name' => $request->nome,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password
        ]);

        return redirect(route('admin.administrador.index'))->with('sucesso', 'Administrador atualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function getDataTables()
    {
        return Datatables::of(Admin::query()->orderBy('name', 'asc'))
            ->addColumn('created_at', function ($admin) {
                return Helper::getLocalizedDate($admin);
            })
            ->addColumn('opcoes', function ($admin) {
                $btnEditar = '<a href="/admin/administrador/' . $admin->id . '/edit" class="btn btn-block btn-sm btn-primary "><i class="fas fa-edit"></i> Editar</a>';
                $btnApagar = '<button class="btn btn-block btn-sm btn-danger" onclick="fecthDelete(' . $admin->id . ', ' . "'/admin/administrador/'" . ', '. "'DELETE'" .')"><i class="fas fa-trash"></i> Eliminar</button>';
                return $btnEditar . $btnApagar;
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }
}
