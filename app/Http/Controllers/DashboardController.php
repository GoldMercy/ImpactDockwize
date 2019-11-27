<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\HousingChart;

use App\Business;

class DashboardController extends Controller
{
    public function index(){
        $flex_data = Business::where('Huisvesting', '=', 'Flex')->count();
        $loods_data = Business::where('Huisvesting', '=', 'Loodsunit')->count();
        $kantoor_data = Business::where('Huisvesting', '=', 'Kantoor')->count();

        $housingchart = new HousingChart;
        $housingchart->labels(['Flex', 'Loodsunit', 'Kantoor']);
        $housingchart->dataset('housing', 'bar', [$flex_data, $loods_data, $kantoor_data]);

        $businesses = DB::table('business')->get();

        return view('dashboard/index', ['businesses' => $businesses, 'housingchart' => $housingchart]);
    }


}
