<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VornoiChartController extends Controller
{
    public function data() {
        $datas = DB::connection('look4care')->table('patient')->select(['longitude', 'latitude'])
        ->get()->map(function($e) {
            return ["x" => floatval($e->latitude), "y" => floatval($e->longitude)];
        })->toArray();

        return $datas;
    }
}
