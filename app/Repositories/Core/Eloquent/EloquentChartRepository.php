<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 17/04/19
 * Time: 20:57
 */

namespace App\Repositories\Core\Eloquent;

use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\ChartRepositoryInterface;

class EloquentChartRepository extends BaseEloquentRepository implements ChartRepositoryInterface
{
    public function entity()
    {
//        return Chart::class;
    }
}
