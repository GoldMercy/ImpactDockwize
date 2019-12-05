<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ScaleQ;
use App\Survey;

class ScaleQsController extends Controller
{
    public function create()
    {
        $surveys = Survey::all();
        return view('scaleqs.create')->with([
            'surveys' => $surveys
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'scaleq_name' => 'required',
            'survey_id' => 'required'
        ]);

        $scaleq = new ScaleQ;
        $scaleq->scaleq_id = $this->getNextId();
        $scaleq->scaleq_name = $request->scaleq_name;
        $scaleq->survey_id = $request->survey_id;
        $scaleq->save();

        return redirect('/scaleqs/create')->with('success', 'Vraag gemaakt!');
    }

    public function show($id)
    {
        $scaleq = ScaleQ::find($id);
        $connectedsurveys = ScaleQ::where('scaleq_id', $scaleq->scaleq_id)->get();
        return view('scaleqs.show')->with(['scaleq' => $scaleq, 'connectedsurveys' => $connectedsurveys]);
    }

    public function edit($id)
    {
        $scaleq = ScaleQ::find($id);
        $surveys = DB::table('surveys')->get();
        $connectedsurveys = ScaleQ::where('scaleq_id', $scaleq->id)->get();
        $allqs = ScaleQ::where('survey_id', $id)->get();
        return view('scaleqs.edit')->with(['scaleq' => $scaleq, 'surveys' => $surveys, 'allqs' => $allqs, 'connectedsurveys' => $connectedsurveys]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'scaleq_name' => 'required',
        ]);

        $scaleq = ScaleQ::find($id);
        $scaleq->scaleq_name = $request->scaleq_name;
        $scaleq->survey_id = $request->survey_id;
        $scaleq->save();

        return redirect()->back()->with('success', 'Vraag aangepast!');
    }

    public function delete($id)
    {
        $scaleq = ScaleQ::find($id);
        $scaleq->delete();
        return redirect('/questions')->with('success', 'Vraag verwijderd!');
    }

    public function add(Request $request)
    {
        $scaleq = ScaleQ::find($request['id']);
        $name = $scaleq->scaleq_name;

        ScaleQ::create([
            'survey_id' => $request['survey_id'],
            'scaleq_id' => $scaleq->scaleq_id,
            'scaleq_name' => $name
        ]);

        return redirect()->back()->with('success', 'Vraag toegevoegd aan een vragenlijst!');
    }

    public function getNextId()
    {
        $highest = ScaleQ::max('scaleq_id');
        return $highest + 1;
    }

    public function deleteAllsq($id){
        DB::table('scaleqs')->delete($id);

        return redirect('/questions')->with('success', 'Vraag uit alle vragenlijsten verwijderd!');
    }
}
