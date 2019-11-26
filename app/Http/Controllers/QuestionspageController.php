<?php

namespace App\Http\Controllers;

use App\OpenQ;
use Illuminate\Support\Facades\DB;

class QuestionspageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function questions(){
        $openqs = DB::table('openqs')->get() ;
        $usedIds = array();
        $viewQs = array();
        foreach($openqs as $oq) {
            if (!in_array($oq->openq_id, $usedIds)) {
                array_push($viewQs, $oq);
                array_push($usedIds, $oq->openq_id);
            }
        }
        $dropdownqs = DB::table('dropdownqs')->get();
        $scaleqs = DB::table('scaleqs')->get();

        return view('pages.index', ['openqs' => $viewQs, 'dropdownqs' => $dropdownqs, 'scaleqs' => $scaleqs]);
    }

    public function edit($id)
    {
        $openq = Openq::find($id);
        return view('surveys.edit')->with('openq', $openq);
    }
}
