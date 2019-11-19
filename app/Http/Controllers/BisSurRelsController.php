<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BisSurRel;
use App\Survey;
use App\Business;
use Illuminate\Support\Facades\DB;

class BisSurRelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $surveys = Survey::all();
        $businesses = Business::all();
        $bissurrels = DB::table('bis_sur_rel')->paginate(20);

        return view('bissurrels.index')->with([
            'bissurrels' => $bissurrels,
            'surveys' => $surveys,
            'businesses' => $businesses
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surveys = Survey::all();
        $businesses = Business::all();        
        return view('bissurrels.create')->with([
            'surveys' => $surveys,
            'businesses' => $businesses
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'survey_id' => 'required',
            'business_id' => 'required'
        ]);

        $bissurel = new BisSurRel;
        $bissurel->business_id = $request->business_id;
        $bissurel->survey_id = $request->survey_id;
        $bissurel->save();

        return redirect('/bissurrels/create')->with('success', 'Koppeling gemaakt!');
    }
}
