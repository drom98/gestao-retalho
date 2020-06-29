<?php


namespace App\Http\Services;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ChartService
{
    public function chartRetalhosPorTipoVidro()
    {
        $chart_options = [
            'chart_title' => 'Retalhos por tipo de vidro',
            'chart_type' => 'pie',
            'model' => 'App\Retalho',
            'report_type' => 'group_by_relationship',
            'relationship_name' => 'tipoVidro',
            'group_by_field' => 'nome',
        ];

        return new LaravelChart($chart_options);
    }

    public function chartRetalhosUsadosPorTipoVidro()
    {
        $chart_options = [
            'chart_title' => 'Retalhos usados por tipo de vidro',
            'chart_type' => 'pie',
            'model' => 'App\RetalhoUsado',
            'report_type' => 'group_by_relationship',
            'relationship_name' => 'retalho',
            'group_by_field' => 'nome',
        ];

        return new LaravelChart($chart_options);
    }


}
