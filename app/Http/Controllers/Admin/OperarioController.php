<?php


namespace App\Http\Controllers\Admin;


use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class OperarioController extends Controller
{
    public function index()
    {
        return view('admin.operario.index');
    }

    public function create()
    {
        return view('admin.operario.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect(route('admin.operario.index'))->with('sucesso', 'Utilizador adicionado.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = User::findOrFail($user);

        return view('admin.operario.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Localizacao  $localizacao
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $user)
    {
        $request->validate([
            'username' => 'unique:users',
            'email' => 'unique:users'
        ]);

        $user = User::findOrFail($user);

        $user->update([
            'name' => $request->nome,
            'username' => $request->username,
            'email' => $request->email
        ]);

        return redirect(route('admin.operario.index'))->with('sucesso', 'Utilizador atualizado.');
    }

    public function getDataTables()
    {
        return Datatables::of(User::query())
            ->addColumn('created_at', function ($user) {
                return Helper::getLocalizedDate($user);
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
