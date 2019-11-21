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
            'survey_id' => 'required',
        ]);
        
        $scaleq = new ScaleQ;
        $scaleq->scaleq_name = $request->scaleq_name;
        $scaleq->survey_id = $request->survey_id;
        $scaleq->save();
        
        return redirect('/scaleqs/create')->with('success', 'Vraag gemaakt!');
    }

    public function show($id)
    {
        $scaleq = ScaleQ::find($id);
        return view('scaleqs.show')->with('scaleq', $scaleq);
    }

    public function edit($id)
    {
        $surveys = DB::table('surveys')->get();
        $scaleq = ScaleQ::find($id);
        $surveys = Survey::all();
        return view('scaleqs.edit')->with(['scaleq' => $scaleq, 'surveys' => $surveys]);
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
        
        return redirect('/questions')->with('success', 'Vraag aangepast!');
    }

    public function delete($id)
    {
        $scaleq = ScaleQ::find($id);
        $scaleq->delete();
        return redirect('/questions')->with('success', 'Vraag verwijderd!');
    }
}
