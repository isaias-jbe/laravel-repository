<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 02/05/19
 * Time: 21:46
 */

namespace App\Repositories\Contracts;


interface ReportsRepositoryInterface
{
    public function byMonths(int $year): array;
    public function getMonthlyReport(int $yearStart = null, int $yearEnd = null, string $type = 'bar');
    public function getYearlyReport(): array;
    public function getReportsMonthsByYear(int $year): array;
}
