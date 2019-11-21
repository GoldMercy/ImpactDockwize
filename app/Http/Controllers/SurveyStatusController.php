<?php

namespace App\Http\Controllers;

use App\SurveyStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        $surveys = DB::table('surveys')->get();
        $allbuss = DB::table('business')->get();
        $surtats = DB::table('survey_statuses')->get();

        return view('surstat.create')->with([
            'surveys' => $surveys,
            'allbuss' => $allbuss,
            'surtats' => $surtats,
            ]);
    }

    public function addstat(Request $request) {
        
        $this->validate($request, [
            'status' => 'required',
            'business_name' => 'required',
            'survey_name' => 'required',
        ]);

        $surstat = new SurveyStatus;
        $surstat->status = $request->status;
        $surstat->business_name = $request->business_name;
        $surstat->survey_name = $request->survey_name;
        $surstat->save();

        return redirect('/admin')->with('success', 'Status bijgewerkt!');
    }    
}
