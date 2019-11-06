<?php

namespace App\Http\Controllers;

use App\Survey;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Question;
use App\Answertype;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = DB::table('questions')->paginate(20);
        return view('questions.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surveys = Survey::all();
        return view('questions.create')->with([
            'surveys' => $surveys
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

       $question = Question::create([
         'questionName' => $request['questionName'],
           'answer_type' => $request['answer_type'],
           'survey_id' => $request['survey_id']
       ]);

        return redirect('/questions')->with('success', 'Vraag gemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('questions.edit')->with('question', $question);
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
        $question = Question::find($id);
        $question->questionName = $request->questionName;
        $question->answer_type = $request->answer_type;
        $question->save();
           
        return redirect('/questions')->with('success', 'Vraag aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect('/questions')->with('success', 'Vraag verwijderd!');
    }

    public function downloadPDF($id) {
        $question = Question::find($id);
        $pdf = PDF::loadView('pdf', compact('question'));

        return $pdf->download('test.pdf');
    }

//    public function pdfexport($id){
//        $question = Question::find($id);
//        $pdf = PDF::loadView('pdf', compact('question'));
//
//        $fileName = $question->Titel;
//        return $pdf->stream($fileName . 'pdf')->with($question, 'question');
//    }
}
