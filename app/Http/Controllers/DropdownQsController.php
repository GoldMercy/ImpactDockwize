<?php

namespace App\Http\Controllers;

use App\DropdownQ;
use App\Multiplechoice;
use App\MultiplechoiceOptions;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use App\Survey;
use App\DropdownQOptions;
use Illuminate\Support\Facades\DB;

class DropdownQsController extends Controller
{
    public function create()
    {
        $surveys = Survey::all();
        return view('dropdownqs.create')->with([
            'surveys' => $surveys
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'dropdownq_name' => 'required',
            'survey_id' => 'required',
        ]);
        
        $dpq = new DropdownQ;
        $dpq->dropdownq_id = $this->getNextId();
        $dpq->dropdownq_name = $request->dropdownq_name;
        $dpq->survey_id = $request->survey_id;
        $dpq->save();


        $dp_options[] = $request->toArray();
        array_pop($dp_options[0]);
        array_shift($dp_options[0]);
        foreach ($dp_options[0] as $dp_option){
            $dpqo = new DropdownQOptions;
            $dpqo->dropdownoption_name = $dp_option;
            $dpqo->dropdown_id = $dpq->id;
            $dpqo->save();
        }

        return redirect('/dropdownqs/create')->with('success', 'Vraag gemaakt!');
    }


    public function show($id)
    {
        $dpq = DropdownQ::find($id);
        $dpqo = DB::table('dropdownqs_options')->where('dropdown_id', '=', $id)->get();
        $css = DropdownQ::where('dropdownq_id', $dpq->dropdownq_id)->get();
        return view('dropdownqs.show')->with([
            'dpq' => $dpq, 
            'dpqo' => $dpqo, 
            'css' => $css
        ]);
    }

    public function edit($id)
    {
        $dpq = DropdownQ::find($id);
        $dpqos = DB::table('dropdownqs_options')->where('dropdown_id', '=', $id)->get();
        $surs = DB::table('surveys')->get();
        $css = DropdownQ::where('dropdownq_id', $dpq->dropdownq_id)->get();
        $alldpqs = DropdownQ::where('dropdownq_id', $id)->get();

        return view('dropdownqs.edit')->with([
            'dpq' => $dpq, 
            'dpqos' => $dpqos, 
            'surs' => $surs, 
            'alldpqs' => $alldpqs, 
            'css' => $css
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dropdownq_name' => 'required'
        ]);

        $dpq = DropdownQ::find($id);
        $dpq->dropdownq_name = $request->dropdownq_name;
        $dpq->survey_id = $request->survey_id;
        $dpq->save();
           
        return redirect()->back()->with('success', 'Vraag aangepast!');
    }

    public function delete($id)
    {
        $dpo = DropdownQOptions::where('dropdownoption_id', '=', $id)->first();
        $dp = DropdownQ::find($id);
        $dpo->delete();
        $dp->delete();
        return redirect('/questions')->with('success', 'Vraag verwijderd!');
    }

    public function addMore()
    {
        return view("/dropdownqs/create");
    }

    public function addMorePost(Request $request)
    {
        $rules = [];

        foreach($request->input('dropdownq_name') as $key => $value) {
            $rules["dropdownq_name.{$key}"] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            foreach($request->input('name') as $key => $value) {
                Multiplechoice::create(['dropdownq_name'=>$value]);
            }
            return response()->json(['success'=>'done']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
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

        return redirect()->back()->with('success', 'Vraag toegevoegd aan een vragenlijst!');
    }

    public function getNextId(){
        $highest = DropdownQ::max('dropdownq_id');
        return $highest+1;
    }

    public function destroydpo($dropdownq_id)
    {
        $dpo = DB::table('dropdownqs_options')->where('id', '=', $dropdownq_id);
        $dpo->delete();
        return redirect()->back()->with('success', 'Optie voor dropdown vraag verwijderd.');
    }

    public function deletealldpq($id) {
        DB::table('dropdownqs')->delete($id);

        return redirect('/questions')->with('success', 'Alle dropdown vragen verwijderd!');
    }
}
