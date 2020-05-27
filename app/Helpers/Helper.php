<?php


namespace App\Helpers;


use Carbon\Carbon;

class Helper
{
    public static function getLocalizedDate($model)
    {
        return Carbon::parse($model->created_at)->locale('pt_PT')->timezone('Europe/Lisbon')->isoFormat('LLL');
    }

    public static function getArea($largura, $comprimento)
    {
        return ($largura * $comprimento)/1000000;
    }
}
