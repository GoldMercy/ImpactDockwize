<?php

namespace App\Http\Controllers;

use App\Survey;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\OpenQ;
use Illuminate\Support\Facades\DB;

class OpenQsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $openqs = DB::table('openqs')->paginate(20);
        return view('openqs.index')->with('openqs', $openqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
/*        $surveys = Survey::all();
        return view('questions.create')->with([
            'surveys' => $surveys
            ]);*/
        return view('openqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/*       $question = Question::create([
         'questionName' => $request['questionName'],
           'answer_type' => $request['answer_type'],
           'survey_id' => $request['survey_id']
       ]);
        $this->validate($request, [
            'openq_name' => 'required'
        ]);*/

        $openq = new OpenQ;
        $openq->openq_name = $request->openq_name;
        $openq->save();

        return redirect('/openqs')->with('success', 'Vraag gemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $openq = OpenQ::find($id);
        return view('openqs.show')->with('openq', $openq);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $openq = OpenQ::find($id);
        return view('openqs.edit')->with('openq', $openq);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'openq_name' => 'required'
        ]);

        $openq = OpenQ::find($id);
        $openq->openq_name = $request->openq_name;
        $openq->save();
        
           
        return redirect('/openqs')->with('success', 'Vraag aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $openq = OpenQ::find($id);
        $openq->delete();
        return redirect('/openqs')->with('success', 'Vraag verwijderd!');
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
