<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Services\RetalhoService;
use App\Localizacao;
use App\Retalho;
use App\TipoVidro;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RetalhoController extends Controller
{

    private $retalhoService;

    /**
     * RetalhoController constructor.
     * @param $retalhoService
     */
    public function __construct(RetalhoService $retalhoService)
    {
        $this->retalhoService = $retalhoService;
    }

    public function index()
    {
        return view('admin.retalho.index');
    }

    public function create()
    {
        return view('admin.retalho.create', [
            'tiposVidro' => TipoVidro::all(),
            'localizacoes' => Localizacao::all()
        ]);
    }

    public function store(Request $request)
    {
        return $this->retalhoService->store($request);
    }

    public function getViewUsado()
    {
        return view('admin.retalho.usado');
    }

    public function getUsado()
    {
        return DataTables::of(Retalho::where('usado', 1)->get())
            ->addColumn('id_tipoVidro', function ($retalho) {
                return $retalho->TipoVidro->nome;
            })
            ->addColumn('id_localizacao', function ($retalho) {
                return $retalho->Localizacao->nome;
            })
            ->addColumn('created_at', function ($retalho) {
                return $retalho->created_at->format('d M Y');
            })
            ->addColumn('opcoes', function ($retalho) {
                $btnUsar = '<a href="/admin/retalho/' . $retalho->id . '/edit" class="btn btn-sm btn-success "><i class="fas fa-check"></i> Usar</a>';
                $btnEditar = '<a style="margin-left: 6px;" href="/admin/retalho/' . $retalho->id . '/edit" class="btn btn-sm btn-primary "><i class="fas fa-edit"></i> Editar</a>';
                $btnApagar = '<a style="margin-left: 6px;" href="/admin/retalho/' . $retalho->id . '/edit" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i> Eliminar</a>';
                return $btnUsar . $btnEditar . $btnApagar;
            })
            ->rawColumns(['opcoes'])
            ->make(true);
    }

    public function getDataTables()
    {
        return $this->retalhoService->getDataTables();
    }
}
