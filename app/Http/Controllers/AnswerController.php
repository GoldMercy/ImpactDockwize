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

        foreach ($answers as $answer){
            $array[] = $answer->request;
            $string = implode($array);
            $json = json_decode($string);
        }

        return view('answer/index', ['surveys' => $surveys, 'json' => $json]);


    }

    public function select(Request $request){

        return redirect()->action('AnswerController@survey', ['id'=>$request->Vragenlijst]);
    }

    public function survey($id){

        $survey = DB::table('surveys')->find($id);
        $openqs = DB::table('openqs')->where('survey_id', '=', $id)->get();
        $scaleqs = DB::table('scaleqs')->where('survey_id', '=', $id)->get();
        return view('answer/survey', ['survey' => $survey, 'openqs' => $openqs, 'scaleqs' => $scaleqs]);
    }

    public function submit(Request $request){

        $answer = new Answer();
        $answer->request = $request->toArray();
        $answer->save();

        return redirect()->action('AnswerController@index')->with('success', 'Vragenlijst ingevuld!');;
    }
}
