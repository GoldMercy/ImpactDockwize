<?php

namespace App\Http\Controllers;

use App\OpenQ;
use App\Survey;
use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $survey = DB::table('surveys')->paginate(25);
        return view('surveys.index', ['survey' => $survey]);
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titel' => 'required',
            'beschrijving' => 'required'
        ]);

        $survey = new Survey;
        $survey->titel = $request->titel;
        $survey->beschrijving = $request->beschrijving;
        $survey->save();

        return (redirect('/surveys'));
    }

    public function show($id)
    {
        $survey = Survey::find($id);
        $openqs = OpenQ::where('survey_id', $id)->get();
        $business = Business::all();
        return view('surveys.show', ['survey' => $survey, 'openqs' => $openqs, 'business' => $business]);
    }

    public function edit($id)
    {
        $survey = Survey::find($id);
        return view('surveys.edit')->with('survey', $survey);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titel' => 'required',
            'beschrijving' => 'required'
        ]);

        $survey = Survey::find($id);
        $survey->titel = $request->titel;
        $survey->beschrijving = $request->beschrijving;
        $survey->save();

        return(redirect('/surveys')->with('success', 'Vragenlijst aangepast!'));
    }

    public function destroy($id)
    {
        $survey = Survey::find($id);
        $survey->delete();
        return redirect('/surveys')->with('success', 'Vragenlijst verwijderd!');
    }

    public function addsur() {
        $business = Business::all();

        return view('surveys.addsur')->with([
            'business'  => $business,
        ]);
    }

    public function updatesur (Request $request, $id) {
        $survey = Survey::find($id);
        $survey->business_id = $request->business_id;
        $survey->save();

        return redirect('/surveys')->with('success', 'Bedrijf toegevoegd!');
    }
    
}
