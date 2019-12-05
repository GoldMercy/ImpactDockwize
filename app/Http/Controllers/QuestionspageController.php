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
        $dropdownqs = DB::table('dropdownqs')->get();
        $scaleqs = DB::table('scaleqs')->get();
        $multiqs = DB::table('multiplechoice')->get();


        return view('pages.index', ['openqs' => $openqs, 'dropdownqs' => $dropdownqs, 'scaleqs' => $scaleqs, 'multiqs' => $multiqs]);

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
