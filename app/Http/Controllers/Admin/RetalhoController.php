<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Services\RetalhoService;
use App\Retalho;

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
        $retalho = Retalho::all();
        return view('admin.retalho.index', [
            'retalho' => $retalho
        ]);
    }

    public function getDataTables()
    {
        return $this->retalhoService->getDataTables();
    }
}
