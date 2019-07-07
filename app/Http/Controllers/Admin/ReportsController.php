<?php

namespace App\Http\Controllers\Admin;

use App\Charts\ReportsChart;
use App\Enum\Enum;
use App\Repositories\Contracts\ReportsRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    private $reportsRepository;

    public function __construct(ReportsRepositoryInterface $reportsRepository)
    {
        $this->reportsRepository = $reportsRepository;
    }

    public function months(ReportsChart $chart)
    {
        $chart->labels(Enum::months());
        $chart->dataset('2017', 'bar',
            $this->reportsRepository->byMonths(2017))
            ->color('#8A2BE2')->backgroundcolor('#EE82EE');

        $chart->dataset('2018', 'bar',
            $this->reportsRepository->byMonths(2018))
            ->color('#000080')->backgroundcolor('#0000FF');

        return view('admin.charts.chart', compact('chart'));
    }

    public function months2()
    {
        $chart = $this->reportsRepository->getMonthlyReport(2015, 2018);

        return view('admin.charts.chart', compact('chart'));
    }

    public function years(ReportsChart $chart)
    {
        $response = $this->reportsRepository->getYearlyReport();

        $chart->labels($response['labels'])
            ->dataset('Relatório anual', 'bar', $response['values'])
            ->color($response['colors'])
            ->backgroundColor($response['colors']);

        $chart->options([
            'scales' => [
                'yAxes' => [
                    [
                        'ticks' => [
                            'callback' => $chart->rawObject('myCallback')
                        ]
                    ]
                ]
            ]
        ]);

        return view('admin.charts.chart', compact('chart'));
    }

    public function vue()
    {
        return view('admin.charts.vue');
    }
}
