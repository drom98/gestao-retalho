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
        return view('admin.users.operario.index');
    }

    public function create()
    {
        return view('admin.users.operario.create');
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

        return view('admin.users.operario.edit')->with('user', $user);
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
            'username' => 'required|unique:users',
            'email' => 'required|unique:users'
        ]);

        if ($request->password == null) {
            $password = $request->password_old;
        } else {
            $password = Hash::make($request->password);
        }

        $user = User::findOrFail($user);

        $user->update([
            'name' => $request->nome,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password
        ]);

        return redirect(route('admin.operario.index'))->with('sucesso', 'Utilizador atualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $operario, Request $request)
    {
        if ($operario->retalhos->isNotEmpty() || $operario->retalhosUsados->isNotEmpty()) {
            return $request
                ->session()
                ->flash(
                    'erro', 'O utilizador tem retalhos associados. <br>'
                    . 'Retalhos disponíveis: ' . count($operario->retalhos) . '. <br>'
                    . 'Retalhos usados: ' . count($operario->retalhosUsados) . '.'
                );
        }

        try {
            $operario->delete();
            return $request->session()->flash('sucesso', 'Operário eliminado.');
        } catch (\Exception $e) {
            return $request->session()->flash('erro', $e->getMessage());
        }
    }

    public function getDataTables()
    {
        return Datatables::of(User::query()->orderBy('name', 'asc'))
            ->addColumn('created_at', function ($user) {
                return Helper::getLocalizedDate($user);
            })
            ->addColumn('opcoes', function ($user) {
                $btnEditar = '<a href="/admin/operario/' . $user->id . '/edit" class="btn btn-block btn-sm btn-primary "><i class="fas fa-edit"></i> Editar</a>';
                $btnApagar = '<button class="btn btn-block btn-sm btn-danger" onclick="fecthDelete(' . $user->id . ', ' . "'/admin/operario/'" . ', '. "'DELETE'" .')"><i class="fas fa-trash"></i> Eliminar</button>';
                return $btnEditar . $btnApagar;
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }
}
