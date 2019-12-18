<?php

namespace App\Http\Controllers;

use App\OpenQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionspageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function questions(){
        $openqs = DB::table('openqs')->get() ;
        $dropdownqs = DB::table('dropdownqs')->get() ;
        $scaleqs = DB::table('scaleqs')->get();
        $multiqs = DB::table('multiplechoice')->get();
        $usedIds = array();
        $viewQs = array();
        $useddqIds = array();
        $viewDqs = array();
        $usedSqs = array();
        $viewSqs = array();
        $usedMqs = array();
        $viewMqs = array();
        foreach($openqs as $oq) {
            if (!in_array($oq->openq_id, $usedIds)) {
                array_push($viewQs, $oq);
                array_push($usedIds, $oq->openq_id);
            }
        }
        foreach($dropdownqs as $dq){
                if (!in_array($dq->dropdownq_id, $useddqIds)){
                    array_push($viewDqs, $dq);
                    array_push($useddqIds, $dq->dropdownq_id);
                }
            }
        foreach($scaleqs as $sq){
            if (!in_array($sq->scaleq_id, $usedSqs)){
                array_push($viewSqs, $sq);
                array_push($usedSqs, $sq->scaleq_id);
            }
        }
        foreach($multiqs as $mq){
            if (!in_array($mq->multiplechoice_id, $usedMqs)){
                array_push($viewMqs, $mq);
                array_push($usedMqs, $mq->multiplechoice_id);
            }
        }

        return view('pages.index', ['openqs' => $viewQs, 'dropdownqs' => $viewDqs, 'scaleqs' => $viewSqs, 'multiqs' => $viewMqs]);
    }
  
  public function questionsselect(Request $request){
        $openqs = DB::table('openqs')->where('openq_name', 'LIKE', '%' . $request->value . '%')->get();
        $dropdownqs = DB::table('dropdownqs')->where('dropdownq_name', 'LIKE', '%' . $request->value . '%')->get();
        $scaleqs = DB::table('scaleqs')->where('scaleq_name', 'LIKE', '%' . $request->value . '%')->get();
        $multiqs = DB::table('multiplechoice')->where('multiplechoice_name', 'LIKE', '%' . $request->value . '%')->get();

        return view('pages.index', ['openqs' => $openqs, 'dropdownqs' => $dropdownqs, 'scaleqs' => $scaleqs, 'multiqs' => $multiqs]);

    }

    public function edit($id)
    {
        $openq = Openq::find($id);
        return view('surveys.edit')->with('openq', $openq);
    }
}
