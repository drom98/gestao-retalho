<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categoria.index', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:categorias'
        ]);

        Categoria::create(
            [
                'nome' => $request->nome
            ]
        );

        return redirect(route('admin.categoria.index'))->with('sucesso', 'Categoria adicionada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($categoria)
    {
        $categoria = Categoria::findOrFail($categoria);

        return view('admin.categoria.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoria)
    {
        $categoria = Categoria::findOrFail($categoria);

        $categoria->update([
            'nome' => $request->nome
        ]);

        return redirect(route('admin.categoria.index'))->with('sucesso', 'Categoria atualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoria)
    {
        Categoria::destroy($categoria);

        return redirect(route('admin.categoria.index'))->with('sucesso', 'Categoria eliminada.');
    }

    public function getDataTables()
    {
        return Datatables::of(Categoria::query())
            ->addColumn('opcoes', function ($categoria) {
                $btnEditar = '<a href="/admin/categoria/' . $categoria->id . '/edit" class="btn btn-block btn-sm btn-primary "><i class="fas fa-edit"></i> Editar</a>';
                $btnApagar = '<button class="btn btn-block btn-sm btn-danger" onclick="fecthDelete(' . $categoria->id . ', ' . "'/admin/categoria/'" . ', '. "'DELETE'" .')"><i class="fas fa-trash"></i> Eliminar</button>';
                return $btnEditar . $btnApagar;
            })
            ->addColumn('created_at', function ($categoria) {
                return Helper::getLocalizedDate($categoria);
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }
}
