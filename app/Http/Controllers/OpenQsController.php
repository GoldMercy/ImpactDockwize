<?php

namespace App\Http\Controllers;

use App\Survey;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\OpenQ;
use Illuminate\Support\Facades\DB;

class OpenQsController extends Controller
{
    public function create()
    {
        $surveys = Survey::all();
        return view('openqs.create')->with([
            'surveys' => $surveys
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'openq_name' => 'required',
            'survey_id' => 'required'
        ]);
        
        $oq = new OpenQ;
        $oq->openq_id = $this->getNextId();
        $oq->openq_name = $request->openq_name;
        $oq->survey_id = $request->survey_id;
        $oq->save();

        return redirect('/openqs/create')->with('success', 'Vraag gemaakt!');
    }

    public function show($id)
    {
        $oq = OpenQ::find($id);
        $css = OpenQ::where('openq_id', $oq->openq_id)->get();
        return view('openqs.show')->with([
            'oq' => $oq, 
            'css' => $css
        ]);
    }

    public function edit($id)
    {
        $oq = OpenQ::find($id);
        $surs = DB::table('surveys')->get();
        $css = OpenQ::where('openq_id', $oq->openq_id)->get();
        $alloqs = OpenQ::where('survey_id', $id)->get();

        return view('openqs.edit')->with([
            'oq' => $oq, 
            'surs' => $surs, 
            'alloqs' => $alloqs, 
            'css' => $css
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'openq_name' => 'required',
            'survey_id' => 'required'
        ]);

        $oq = OpenQ::find($id);
        $oq->openq_name = $request->openq_name;
        $oq->survey_id = $request->survey_id;
        $oq->save();
        
           
        return redirect('/questions')->with('success', 'Vraag aangepast!');
    }

    public function delete($id)
    {
        $oq = OpenQ::find($id);
        $oq->delete();
        return redirect('/questions')->with('success', 'Vraag verwijderd!');
    }

    public function add(Request $request)
    {
        $openq = OpenQ::find($request['id']);
        $name = $openq->openq_name;

        OpenQ::create([
            'survey_id' => $request['survey_id'],
            'openq_id' => $openq->openq_id,
            'openq_name' => $name
        ]);

        return redirect('/questions')->with('success', 'Vraag toegevoegd aan een vragenlijst!');
    }

    public function getNextId(){
        $highest = OpenQ::max('openq_id');
        return $highest + 1;
    }


}
