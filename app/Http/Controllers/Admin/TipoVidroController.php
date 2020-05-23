<?php


namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\TipoVidro;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TipoVidroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tipoVidro.index')->with('tipos', TipoVidro::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipoVidro.create')->with('categorias', Categoria::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TipoVidro::create(
            [
                'nome' => $request->nome,
                'id_categoria' => $request->categoria
            ]
        );

        return self::index()->with('sucesso', 'Novo tipo de vidro adicionado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoVidro  $tipoVidro
     * @return \Illuminate\Http\Response
     */
    public function show(TipoVidro $tipoVidro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoVidro  $tipoVidro
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoVidro $tipoVidro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoVidro  $tipoVidro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoVidro $tipoVidro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoVidro  $tipoVidro
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoVidro $tipoVidro)
    {
        //
    }

    public function getDataTables()
    {
        return Datatables::of(TipoVidro::query())
            ->addColumn('created_at', function ($tipoVidro) {
                return Helper::getLocalizedDate($tipoVidro);
            })
            ->addColumn('opcoes', function ($tipoVidro) {
                $btnEditar = '<a style="margin-left: 6px;" href="/admin/tipoVidro/' . $tipoVidro->id . '/edit" class="btn btn-sm btn-primary "><i class="fas fa-edit"></i> Editar</a>';
                $btnApagar = '<a style="margin-left: 6px;" href="/admin/tipoVidro/' . $tipoVidro->id . '/edit" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i> Eliminar</a>';
                return $btnEditar . $btnApagar;
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }
}