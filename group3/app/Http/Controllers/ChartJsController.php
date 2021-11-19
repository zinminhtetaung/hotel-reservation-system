<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChartJsController extends Controller
{
    public function index()
    {
        $months = ['01','02','03','04','05','06','07','08','09','10','11','12'];

        $reservations = [];
        foreach ($months as $key => $value) {
            $reservations[] = Reservation::where( DB::raw("DATE_FORMAT(check_in, '%m')"),$value)->count();
        }

    	return view('chartjs')->with('months',json_encode($months,JSON_NUMERIC_CHECK))->with('reservations',json_encode($reservations,JSON_NUMERIC_CHECK));
    }
}
