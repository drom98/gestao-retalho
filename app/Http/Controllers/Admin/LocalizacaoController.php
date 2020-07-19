<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Localizacao;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LocalizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.localizacao.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.localizacao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:localizacoes'
        ]);

        Localizacao::create([
            'nome' => $request->nome
        ]);

        return redirect(route('admin.localizacao.index'))->with('sucesso', 'Nova localização adicionada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function show(Localizacao $localizacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Localizacao $localizacao)
    {
        return view('admin.localizacao.edit')->with('localizacao', $localizacao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Localizacao $localizacao)
    {
        $request->validate([
            'nome' => 'unique:localizacoes'
        ]);

        $localizacao->update([
           'nome' => $request->nome
        ]);

        return redirect(route('admin.localizacao.index'))->with('sucesso', 'Localização atualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($localizacao)
    {
        Localizacao::destroy($localizacao);

        return redirect(route('admin.localizacao.index'))->with('sucesso', 'Localização eliminada.');
    }

    public function getDataTables()
    {
        return Datatables::of(Localizacao::orderBy('nome', 'asc')->get())
            ->addColumn('opcoes', function ($localizacao) {
                $btnEditar = '<a href="/admin/localizacao/' . $localizacao->id . '/edit" class="btn btn-block btn-sm btn-primary "><i class="fas fa-edit"></i> Editar</a>';
                $btnApagar = '<button class="btn btn-block btn-sm btn-danger" onclick="fecthDelete(' . $localizacao->id . ', ' . "'/admin/localizacao/'" . ', '. "'DELETE'" .')"><i class="fas fa-trash"></i> Eliminar</button>';
                return $btnEditar . $btnApagar;
            })
            ->addColumn('created_at', function ($localizacao) {
                return Helper::getLocalizedDate($localizacao);
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }
}
