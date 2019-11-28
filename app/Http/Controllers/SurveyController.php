<?php

namespace App\Http\Controllers;

use App\OpenQ;
use App\Survey;
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
        $oqs = DB::table('openqs')->where('survey_id', '=', $id)->get();
        $dpqs = DB::table('dropdownqs')->where('survey_id', '=', $id)->get();
        $mpqs = DB::table('multiplechoice')->where('survey_id', '=', $id)->get();
        $scaleqs = DB::table('scaleqs')->where('survey_id', '=', $id)->get();

        return view('surveys.show')->with([
            'survey' => $survey,
            'oqs' => $oqs,
            'dpqs' => $dpqs,
            'mpqs' => $mpqs,
            'scaleqs' => $scaleqs
            ]);
    }

    public function edit($id)
    {
        $survey = Survey::find($id);
        $oqs = DB::table('openqs')->where('survey_id', '=', $id)->get();
        $dpqs = DB::table('dropdownqs')->where('survey_id', '=', $id)->get();
        $mpqs = DB::table('multiplechoice')->where('survey_id', '=', $id)->get();
        $scaleqs = DB::table('scaleqs')->where('survey_id', '=', $id)->get();

        return view('surveys.edit')->with([
            'survey' => $survey,
            'oqs' => $oqs,
            'dpqs' => $dpqs,
            'mpqs' => $mpqs,
            'scaleqs' => $scaleqs
            ]);
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
}
