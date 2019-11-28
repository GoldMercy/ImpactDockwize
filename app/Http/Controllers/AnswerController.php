<?php

namespace App\Http\Controllers;

use App\Answer;
use App\OpenQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function index(){

        $surveys = DB::table('surveys')->get();
        $answers = DB::table('answers')->get();


        return view('answer/index', ['surveys' => $surveys, 'answers' => $answers]);


    }

    public function select(Request $request){

        return redirect()->action('AnswerController@survey', ['id'=>$request->Vragenlijst]);
    }

    public function survey($id){

        $survey = DB::table('surveys')->find($id);
        $businesses = DB::table('business')->get();
        $openqs = DB::table('openqs')->where('survey_id', '=', $id)->get();
        $scaleqs = DB::table('scaleqs')->where('survey_id', '=', $id)->get();
        $dropdownqs = DB::table('dropdownqs')->where('survey_id', '=', $id)->get();
        $qoptions = DB::table('qoptions')->get();
        $multiplechoiceqs = DB::table('multiplechoice')->where('survey_id', '=', $id)->get();
        $multiplechoiceoptions = DB::table('multiplechoice_options')->get();
        return view('answer/survey', ['survey' => $survey, 'openqs' => $openqs, 'scaleqs' => $scaleqs, 'businesses' => $businesses, 'dropdownqs' => $dropdownqs, 'qoptions' => $qoptions,
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
}
