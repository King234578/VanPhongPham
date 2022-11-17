<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function profitByDateRange(Request $request){
        if ($request->ajax()) {
            $fromDate = $request->get('fromDate');
            $toDate = $request->get('toDate');
        }

        if($fromDate == null)
        $fromDate = 0;
        if($toDate == null)
        $toDate = now();

        $chart_data = [];
        $DateList = DB::table('bills')->select('created_at')
                                       ->whereDate('created_at', '>=', $fromDate)
                                       ->whereDate('created_at', '<=', $toDate)
                                       ->oldest()->distinct()->get();

        foreach($DateList as $row){
            $SaleByDate = DB::table('bills')->select('bills.id','bills.total','bills.created_at')
                                             ->where('bills.created_at',$row->created_at)

                                             ->get()->toArray();
            $doanhthu = 0;

            foreach($SaleByDate as $subrow){
                $doanhthu += $subrow->total;
            }
            $chart_data[] = array(
                'date' => $row->created_at,
                'sales' => $doanhthu
            );
        }
        return json_encode($chart_data);
    }
}
