<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ReportsRepositoryInterface;

class ReportsApiController extends Controller
{

    protected $reportsRepository;

    public function __construct(ReportsRepositoryInterface $reportsRepository)
    {
        $this->reportsRepository = $reportsRepository;
    }

    public function months(Request $request)
    {
        $year       = (int) $request->input('year', date('Y'));
        $response   = $this->reportsRepository->getReportsMonthsByYear($year);

        return response()->json($response);
    }
}
