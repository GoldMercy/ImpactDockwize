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
        
        $random = ['survey_name', 'business_name', 'status'];

        $messages = [
            'status.required' => 'Status is verplicht op te geven.',
            'business_name.required' => 'Bedrijfsnaam is verplicht op te geven.',
            'survey_name.required' => 'Naam van vragenlijst is verplicht op te geven.',
            'survey_name.unique' => 'Koppeling bestaat al.'
        ];

        $this->validate($request, [
            'status' => 'required',
            'business_name' => 'required',
            'survey_name' => 'required|unique:survey_statuses',
        ], $messages);

        $surstat = new SurveyStatus;
        $surstat->status = $request->status;
        $surstat->business_name = $request->business_name;
        $surstat->survey_name = $request->survey_name;
        $surstat->save();
    
        return redirect('/surstat/create')->with('success', 'Status bijgewerkt!');
    }    
}
