<?php


namespace App\Http\Services;


use App\Retalho;
use Yajra\DataTables\DataTables;

class RetalhoService
{
    public function getDataTables()
    {
        return Datatables::of(Retalho::query())
            ->addColumn('created_at', function ($retalho) {
                return $retalho->created_at->format('d M Y');
            })
            ->rawColumns(['created_at'])
            ->make(true);
    }
}
