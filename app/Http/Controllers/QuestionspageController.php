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

/*    public function questions()
    {
        $data = DB::table('openqs')
            ->leftJoin('dropdownqs', 'openqs.openq_id', '=', 'dropdownqs.dropdownq_id')
            ->leftJoin('scaleqs', 'openqs.openq_id', '=', 'scaleqs.scaleq_id')
            ->select('openqs.openq_id', 'openqs.openq_name', 'dropdownq_id', 'dropdownq_name', 'scaleq_id', 'scaleq_name')
            ->get();
        return view('pages.index', ['data' => $data]);
    }*/
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
