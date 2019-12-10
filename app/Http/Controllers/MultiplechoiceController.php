<?php

namespace App\Http\Controllers;

use App\Multiplechoice;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use App\Survey;
use App\MultiplechoiceOptions;
use Illuminate\Support\Facades\DB;

class MultiplechoiceController extends Controller
{

    public function create()
    {
        $surveys = Survey::all();
        return view('multiplechoice.create')->with([
            'surveys' => $surveys
        ]);
    }

    public function show($id)
    {
        $mp = Multiplechoice::find($id);
        $mpos = MultiplechoiceOptions::where('multiplechoice_id', '=', $id)->get();
        $css = Multiplechoice::where('multiplechoice_id', $mp->multiplechoice_id)->get();

        return view('multiplechoice.show')->with([
            'mp' => $mp, 
            'mpos' => $mpos, 
            'css' => $css, 
            ]);
    }

    public function edit($id)
    {
        $mp = Multiplechoice::find($id);
        $mpos = MultiplechoiceOptions::where('multiplechoice_id', '=', $id)->get();
        $surs = DB::table('surveys')->get();
        $css = Multiplechoice::where('multiplechoice_id', $mp->multiplechoice_id)->get();
        $allmpqs = Multiplechoice::where('survey_id', $id)->get();

        return view('multiplechoice.edit')->with([
            'mp' => $mp,
            'surs' => $surs,
            'mpos' => $mpos,
            'allmpqs' => $allmpqs,
            'css' => $css
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'multiplechoice_name' => 'required'
        ]);

        $mp = Multiplechoice::find($id);
        $mp->multiplechoice_name = $request->multiplechoice_name;
        $mp->survey_id = $request->survey_id;
        $mp->save();
           
        return redirect()->back()->with('success', 'Vraag aangepast!');
    }

    public function delete($id)
    {
        $mpos = MultiplechoiceOptions::where('multiplechoice_id', '=', $id);
        $mp = Multiplechoice::find($id);
        $mpos->delete();
        $mp->delete();
        return redirect('/input')->with('success', 'Vraag verwijderd!');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'multiplechoice_name' => 'required',
            'survey_id' => 'required',
        ]);
        
        $mp = new Multiplechoice;
        $mp->multiplechoice_id = $this->getNextId();
        $mp->multiplechoice_name = $request->multiplechoice_name;
        $mp->survey_id = $request->survey_id;
        $mp->save();

        $mp_options[] = $request->toArray();
        array_pop($mp_options[0]);
        array_shift($mp_options[0]);
        foreach ($mp_options[0] as $mp_option){
            $mpo = new MultiplechoiceOptions;
            $mpo->multiplechoice_option = $mp_option;
            $mpo->multiplechoice_id = $mp->multiplechoice_id;
            $mpo->save();
        }

        return redirect('/multiplechoice/create')->with('success', 'Vraag gemaakt!');
    }

    public function add(Request $request)
    {
        $multiplechoice = Multiplechoice::find($request['id']);
        $name = $multiplechoice->multiplechoice_name;
        $random = MultiplechoiceOptions::all();

        Multiplechoice::create([
            'survey_id' => $request['survey_id'],
            'multiplechoice_id' => $multiplechoice->multiplechoice_id,
            'multiplechoice_name' => $name
        ]);


        MultiplechoiceOptions::create([
            'multiplechoice_id' => $multiplechoice->multiplechoice_id,
            'multiplechoice_option' => $random->multiplechoice_option
        ]);

        return redirect()->back()->with('success', 'Vraag toegevoegd aan een vragenlijst!');

    }

    public function getNextId()
    {
        $highest = Multiplechoice::max('multiplechoice_id');
        return $highest + 1;
    }

    public function addMore()
    {
        return view("/multiplechoice/create");
    }

    public function addMorePost(Request $request)
    {
        $rules = [];

        foreach($request->input('multiplechoice_name') as $key => $value) {
            $rules["multiplechoice_name.{$key}"] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            foreach($request->input('name') as $key => $value) {
                Multiplechoice::create(['multiplechoice_name'=>$value]);
            }
            return response()->json(['success'=>'done']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function destroympo($multiplechoice_id)
    {
        $mpo = DB::table('multiplechoice_options')->where('multiplechoice_options_id', '=', $multiplechoice_id);
        $mpo->delete();
        return redirect('/questions')->with('success', 'Optie voor multiplechoice vraag verwijderd.');
    }
}
