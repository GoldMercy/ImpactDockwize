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
        $dropdownq->dropdownq_name = $request->dropdownq_name;
        $dropdownq->survey_id = $request->survey_id;
        $dropdownq->save();

        return redirect('/dropdownqs')->with('success', 'Vraag gemaakt!');
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
        return view('dropdownqs.edit')->with(['dropdownq' => $dropdownq, 'surveys' => $surveys]);
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
}
