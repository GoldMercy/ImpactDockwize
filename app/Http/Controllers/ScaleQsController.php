<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ScaleQ;
use App\Survey;

class ScaleQsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scaleqs = DB::table('scaleqs')->paginate(20);
        return view('scaleqs.index')->with('scaleqs', $scaleqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surveys = Survey::all();
        return view('scaleqs.create')->with([
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
        
        $this->validate($request, [
            'scaleq_name' => 'required',
            'survey_id' => 'required',
        ]);
        
        $scaleq = new ScaleQ;
        $scaleq->scaleq_name = $request->scaleq_name;
        $scaleq->survey_id = $request->survey_id;
        $scaleq->save();
        
        return redirect('/scaleqs/create')->with('success', 'Vraag gemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scaleq = ScaleQ::find($id);
        return view('scaleqs.show')->with('scaleq', $scaleq);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scaleq = ScaleQ::find($id);
        $surveys = Survey::all();
        return view('scaleqs.edit')->with(['scaleq' => $scaleq, 'surveys' => $surveys]);
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
            'scaleq_name' => 'required',
        ]);
        
        $scaleq = ScaleQ::find($id);
        $scaleq->scaleq_name = $request->scaleq_name;
        $scaleq->save();
        
        return redirect('/scaleqs')->with('success', 'Vraag aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
