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

        $sq = new ScaleQ;
        $sq->scaleq_id = $this->getNextId();
        $sq->scaleq_name = $request->scaleq_name;
        $sq->survey_id = $request->survey_id;
        $sq->save();

        return redirect('/scaleqs/create')->with('success', 'Vraag gemaakt!');
    }

    public function show($id)
    {
        $sq = ScaleQ::find($id);
        $css = ScaleQ::where('scaleq_id', $sq->scaleq_id)->get();
        return view('scaleqs.show')->with([
            'sq' => $sq, 
            'css' => $css
        ]);
    }

    public function edit($id)
    {
        $sq = ScaleQ::find($id);
        $surs = DB::table('surveys')->get();
        $css = ScaleQ::where('scaleq_id', $sq->scaleq_id)->get();
        $allsqs = ScaleQ::where('survey_id', $id)->get();
        return view('scaleqs.edit')->with([
            'sq' => $sq, 
            'surs' => $surs, 
            'allsqs' => $allsqs, 
            'css' => $css
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'scaleq_name' => 'required',
        ]);

        $sq = ScaleQ::find($id);
        $sq->scaleq_name = $request->scaleq_name;
        $sq->survey_id = $request->survey_id;
        $sq->save();

        return redirect()->back()->with('success', 'Vraag aangepast!');
    }

    public function delete($id)
    {
        $sq = ScaleQ::find($id);
        $sq->delete();
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
