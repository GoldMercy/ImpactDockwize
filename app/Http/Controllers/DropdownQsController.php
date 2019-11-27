<?php

namespace App\Http\Controllers;

use App\DropdownQ;
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
        $dpq->dropdownq_name = $request->dropdownq_name;
        $dpq->survey_id = $request->survey_id;
        $dpq->save();


        $options[] = $request->toArray();
        array_pop($options[0]);
        array_shift($options[0]);
        foreach ($options[0] as $option){
            $dpqo = new DropdownQOptions;
            $dpqo->dropdownoption_name = $option;
            $dpqo->dropdown_id = $dpq->dropdown_id;
            $dpqo->save();
        }

        return redirect('/dropdownqs/create')->with('success', 'Vraag gemaakt!');
    }


    public function show($id)
    {
        $dpq = DropdownQ::find($id);
        $dpqo = DB::table('dropdownqs_options')->where('dropdown_id', '=', $id)->get();
        return view('dropdownqs.show', ['dpq' => $dpq, 'dpqo' => $dpqo]);
    }

    public function edit($id)
    {
        $surveys = DB::table('surveys')->get();
        $dpq = DropdownQ::find($id);
        $dpqo = DB::table('dropdownqs_options')->where('dropdown_id', '=', $id)->get();
        return view('dropdownqs.edit')->with(['dpq' => $dpq, 'surveys' => $surveys, 'options' => $dpqo]);
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
           
        return redirect('/questions')->with('success', 'Vraag aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $multiplechoice_options = MultiplechoiceOptions::where('multiplechoice_id', '=', $id)->first();
        $multiplechoice = Multiplechoice::find($id);
        $multiplechoice_options->delete();
        $multiplechoice->delete();
        return redirect('/multiplechoice')->with('success', 'Vraag verwijderd!');
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
}
