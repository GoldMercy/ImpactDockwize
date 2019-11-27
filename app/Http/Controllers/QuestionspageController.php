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
        $dropdownqs = DB::table('dropdownqs')->get();
        $scaleqs = DB::table('scaleqs')->get();

        return view('pages.index', ['openqs' => $openqs, 'dropdownqs' => $dropdownqs, 'scaleqs' => $scaleqs]);

    }
    public function edit($id)
    {
        $openq = Openq::find($id);
        return view('surveys.edit')->with('openq', $openq);
    }
}
