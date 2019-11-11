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
        $surveys = DB::table('surveys')->paginate(10);
        return view('surveys.index', ['surveys' => $surveys]);
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
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
        return view('surveys.show', ['survey' => $survey], ['openqs' => $openqs]);
    }

    public function edit($id)
    {
        $survey = DB::table('surveys')->find($id);
        return view('surveys.edit', ['survey' => $survey]);
    }

    public function update(Request $request, $id)
    {
        $survey = Survey::find($id);
        $survey->titel = $request->titel;
        $survey->beschrijving = $request->beschrijving;
        $survey->save();

        return(redirect('/surveys'));
    }

    public function destroy($id)
    {
        DB::table('surveys')->delete($id);

        return(redirect('/surveys'));
    }
}
