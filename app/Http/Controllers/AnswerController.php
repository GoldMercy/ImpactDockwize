<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Business;
use App\Exports\AnswerExport;
use App\OpenQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AnswerController extends Controller
{
    public function index(){

        $surveys = DB::table('surveys')->get();
        $answers = DB::table('answers')->get();
        $businesses = DB::table('business')->get();
        $programs = DB::table('programs')->get();

        return view('answer/index', ['surveys' => $surveys, 'answers' => $answers, 'businesses' => $businesses, 'programs' => $programs]);

    }

    public function select(Request $request){

        $businesses = DB::table('business')->where('Programma', '=', $request->Ontvanger)->get();
        $emails = "";
        foreach ($businesses as $business){
            $emails .= $business->Email.",";
        }

        switch ($request->input('action')) {
            case 'survey':
                return redirect()->action('AnswerController@survey', ['id' => $request->Vragenlijst]);
                break;

            case 'mail':
                return redirect()->to('mailto:'.$emails.'?SUBJECT=Vragenlijst Dockwize&BODY=Beste Ondernemer, zou u een vragenlijst willen invullen?: '.url('/').'/answer/survey'.$request->Vragenlijst);
        }
    }

    public function survey($id){

        $survey = DB::table('surveys')->find($id);
        $businesses = DB::table('business')->get();
        $openqs = DB::table('openqs')->where('survey_id', '=', $id)->get();
        $scaleqs = DB::table('scaleqs')->where('survey_id', '=', $id)->get();
        $dropdownqs = DB::table('dropdownqs')->where('survey_id', '=', $id)->get();
        $qoptions = DB::table('dropdownqs_options')->get();
        $multiplechoiceqs = DB::table('multiplechoice')->where('survey_id', '=', $id)->get();
        $multiplechoiceoptions = DB::table('multiplechoice_options')->get();
        return view('answer/survey', ['survey' => $survey, 'openqs' => $openqs, 'scaleqs' => $scaleqs, 'businesses' => $businesses, 'dropdownqs' => $dropdownqs, 'dropdownqs_options' => $qoptions,
        'multiplechoiceqs' => $multiplechoiceqs, 'multiplechoiceoptions' => $multiplechoiceoptions]);
    }

    public function submit(Request $request){
        $answer = new Answer();
        $answer->keys = implode($request->keys(),',');
        $answer->values = implode($request->toArray(),',');
        $answer->save();

        return redirect()->action('AnswerController@index')->with('success', 'Vragenlijst ingevuld!');;
    }

    public function answerIndex(){

        $answers = DB::table('answers')->get();

        return view('answer/answerindex', ['answers' => $answers]);
    }

    public function show($id){

        $answer = DB::table('answers')->find($id);
        $openqs = DB::table('openqs')->get();
        $scaleqs = DB::table('scaleqs')->get();

        return view('answer/show', ['answer' => $answer, 'openqs' => $openqs, 'scaleqs' => $scaleqs]);
    }

    public function export()
    {
        $export = new AnswerExport([
            [1, 2, 3],
            [4, 5, 6]
        ]);

        return Excel::download($export, 'Answers.xlsx');
    }
}
