<?php

namespace App\Http\Controllers;

use App\Survey;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\OpenQ;
use Illuminate\Support\Facades\DB;

class OpenQsController extends Controller
{
    public function create()
    {
        $surveys = Survey::all();
        return view('openqs.create')->with([
            'surveys' => $surveys
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'openq_name' => 'required',
            'survey_id' => 'required'
        ]);
        
        $openq = new OpenQ;
        $openq->openq_id = $this->getNextId();
        $openq->openq_name = $request->openq_name;
        $openq->survey_id = $request->survey_id;
        $openq->save();

        return redirect('/openqs/create')->with('success', 'Vraag gemaakt!');
    }

    public function show($id)
    {
        $openq = OpenQ::find($id);
        return view('openqs.show')->with('openq', $openq);
    }

    public function edit($id)
    {
        $openq = OpenQ::find($id);
        $surveys = DB::table('surveys')->get();
        $connectedsurveys = OpenQ::where('openq_id', $openq->openq_id)->get();
        $allqs = OpenQ::where('survey_id', $id)->get();
        return view('openqs.edit')->with(['openq' => $openq, 'surveys' => $surveys, 'allqs' => $allqs, 'connectedsurveys' => $connectedsurveys]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'openq_name' => 'required',
            'survey_id' => 'required'
        ]);

        $openq = OpenQ::find($id);
        $openq->openq_name = $request->openq_name;
        $openq->survey_id = $request->survey_id;
        $openq->save();
        
           
        return redirect('/questions')->with('success', 'Vraag aangepast!');
    }

    public function delete($id)
    {
        $openq = OpenQ::find($id);
        $openq->delete();
        return redirect('/questions')->with('success', 'Vraag verwijderd!');
    }

    public function add(Request $request)
    {
        $openq = OpenQ::find($request['id']);
        $name = $openq->openq_name;

        OpenQ::create([
            'survey_id' => $request['survey_id'],
            'openq_id' => $openq->openq_id,
            'openq_name' => $name
        ]);

        return redirect('/questions')->with('success', 'Vraag toegevoegd aan een vragenlijst!');
    }

    public function getNextId(){
        $highest = OpenQ::max('openq_id');
        return $highest+1;
    }

/*    public function downloadPDF($id) {
        $question = Question::find($id);
        $pdf = PDF::loadView('pdf', compact('question'));

        return $pdf->download('test.pdf');
    }*/

//    public function pdfexport($id){
//        $question = Question::find($id);
//        $pdf = PDF::loadView('pdf', compact('question'));
//
//        $fileName = $question->Titel;
//        return $pdf->stream($fileName . 'pdf')->with($question, 'question');
//    }
}
