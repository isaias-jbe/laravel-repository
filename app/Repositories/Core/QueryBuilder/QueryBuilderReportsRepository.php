<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 02/05/19
 * Time: 21:51
 */

namespace App\Repositories\Core\QueryBuilder;

use DB;
use Carbon\Carbon;
use App\Enum\Enum;
use App\Charts\ReportsChart;
use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\ReportsRepositoryInterface;

class QueryBuilderReportsRepository extends BaseQueryBuilderRepository implements ReportsRepositoryInterface
{
    protected $table = 'orders';
    /**
     * @param int $year
     * @return array
     */
    public function byMonths(int $year): array
    {
        $data = $this->db
                    ->table($this->tb)
                    ->select(DB::raw('SUM(total) as sums'))
                    ->groupBy(DB::raw('date_trunc(\'month\', date)'))
                    ->whereYear('date', $year)
                    ->pluck('sums')
                    ->toArray();
        return $data;
    }

    public function getMonthlyReport(int $yearStart = null, int $yearEnd = null, string $type = 'bar')
    {
        $yearStart  = $yearStart ?? date('Y') - 3;
        $yearEnd    = $yearEnd ?? date('Y');
        $chart      = app(ReportsChart::class);

        $chart->labels(Enum::months());

        for ($year = $yearStart; $year <= $yearEnd; $year++)
        {
            $color = $this::generateColor();
            $chart->dataset($year, $type, $this->byMonths($year))
                ->color($color)->backgroundcolor($color);
        }

        return $chart;
    }

    public function getYearlyReport(): array
    {
        $data = $this->db
            ->table($this->tb)
            ->select(DB::raw('SUM(total) as sums'), DB::raw('extract(year from date) as year'))
            ->groupBy(DB::raw('date_trunc(\'year\', date)'), 'year')
            ->orderBy('year')
            ->get();

        $colors = $data->map(function ($value, $key){
            return $this::generateColor();
        });

        $values = $data->map(function ($order, $key) {
           return number_format($order->sums, 0, '','');
        });

        return [
            'labels' => $data->pluck('year'),
            'values' => $values,
            'colors' => $colors
        ];
    }

    public function getReportsMonthsByYear(int $year): array
    {
        $data = $this->db
            ->table($this->tb)
            ->select(DB::raw('SUM(total) as sums'))
            ->groupBy(DB::raw('date_trunc(\'month\', date)'))
            ->whereYear('date', $year)
            ->get();

        $colors = $data->map(function ($value, $key){
            return $this::generateColor();
        });

        $values = $data->map(function ($order, $key) {
            return number_format($order->sums, 0, '','');
        });

        return [
            'labels' => Enum::months(),
            'values' => $values,
            'colors' => $colors
        ];
    }

    public static function generateColor()
    {
        return '#' . dechex(rand(0x000000, 0xFFFFFF));
    }
}
