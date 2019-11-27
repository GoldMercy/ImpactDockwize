<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DropdownQ;
use App\QOption;
use App\Survey;
use Illuminate\Support\Facades\DB;

class DropdownQsController extends Controller
{
    public function create()
    {
        $qoptions = QOption::all();
        $surveys = Survey::all();
        return view('dropdownqs.create')->with([
            'qoptions' => $qoptions,
            'surveys' => $surveys
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'dropdownq_name' => 'required',
            'survey_id' => 'required',
        ]);
        
        $dropdownq = new DropdownQ;
        $dropdownq->dropdownq_id = $this->getNextId();
        $dropdownq->dropdownq_name = $request->dropdownq_name;
        $dropdownq->survey_id = $request->survey_id;
        $dropdownq->save();

        return redirect('/input')->with('success', 'Vraag gemaakt!');
    }

    public function show($id)
    {
        $dropdownq = DropdownQ::find($id);
        $qoptions = QOption::where('dropdownq_fk', $id)->get();
        return view('dropdownqs.show', ['dropdownq' => $dropdownq], ['qoptions' => $qoptions]);
    }

    public function edit($id)
    {
        $surveys = DB::table('surveys')->get();
        $dropdownq = DropdownQ::find($id);
        $connectedsurveys = DropdownQ::where('dropdownq_id', $dropdownq->dropdownq_id)->get();
        $allqs = DropdownQ::where('dropdownq_id', $id)->get();
        return view('dropdownqs.edit')->with(['dropdownq' => $dropdownq, 'surveys' => $surveys, 'allqs' => $allqs, 'connectedsurveys' => $connectedsurveys]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dropdownq_name' => 'required'
        ]);

        $dropdownq = DropdownQ::find($id);
        $dropdownq->dropdownq_name = $request->dropdownq_name;
        $dropdownq->survey_id = $request->survey_id;
        $dropdownq->save();
        
           
        return redirect('/questions')->with('success', 'Vraag aangepast!');
    }

    public function delete($id)
    {
        $dropdownq = DropdownQ::find($id);
        $dropdownq->delete();
        return redirect('/questions')->with('success', 'Vraag verwijderd!');
    }

    public function add(Request $request)
    {
        $dropdownq = DropdownQ::find($request['id']);
        $name = $dropdownq->dropdownq_name;

        DropdownQ::create([
            'survey_id' => $request['survey_id'],
            'dropdownq_id' => $dropdownq->dropdownq_id,
            'dropdownq_name' => $name
        ]);

        return redirect('/questions')->with('success', 'Vraag toegevoegd aan een vragenlijst!');
    }

    public function getNextId(){
        $highest = DropdownQ::max('dropdownq_id');
        return $highest+1;
    }
}
