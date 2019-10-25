<?php

namespace App\Http\Controllers;

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
        $survey = DB::table('surveys')->paginate(2);
        return view('surveys.index', ['survey' => $survey]);
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
        $survey = new Survey;
        $survey->Titel = $request->Titel;
        $survey->Beschrijving = $request->Beschrijving;
        $survey->save();

        return (redirect('/surveys'));
    }

    public function show($id)
    {
        $survey = Survey::find($id);
        return view('surveys.show', ['survey' => $survey]);
    }

    public function edit($id)
    {
        $survey = DB::table('surveys')->find($id);
        return view('surveys.edit', ['survey' => $survey]);
    }

    public function update(Request $request, $id)
    {
        $survey = Survey::find($id);
        $survey->Titel = $request->Titel;
        $survey->Beschrijving = $request->Beschrijving;
        $survey->save();

        return(redirect('/surveys'));
    }

    public function destroy($id)
    {
        DB::table('surveys')->delete($id);

        return(redirect('/surveys'));
    }
}
