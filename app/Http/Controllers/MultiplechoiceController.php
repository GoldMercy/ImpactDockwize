<?php

namespace App\Http\Controllers;

use App\Multiplechoice;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use App\Survey;
use App\MultiplechoiceOptions;
use Illuminate\Support\Facades\DB;
use PhpParser\Parser\Multiple;

class MultiplechoiceController extends Controller
{

    public function create()
    {
        $surveys = Survey::all();
        return view('multiplechoice.create')->with([
            'surveys' => $surveys
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'multiplechoice_name' => 'required',
            'survey_id' => 'required',
        ]);
        
        $multiplechoice = new Multiplechoice;
        $multiplechoice->multiplechoice_id = $this->getNextId();
        $multiplechoice->multiplechoice_name = $request->multiplechoice_name;
        $multiplechoice->survey_id = $request->survey_id;
        $multiplechoice->save();


        $mp_options[] = $request->toArray();
        array_pop($mp_options[0]);
        array_shift($mp_options[0]);
        foreach ($mp_options[0] as $mp_option){
            $multiplechoice_options = new MultiplechoiceOptions;
            $multiplechoice_options->multiplechoice_option = $mp_option;
            $multiplechoice_options->multiplechoice_id = $multiplechoice->multiplechoice_id;
            $multiplechoice_options->save();
        }

        return redirect('/multiplechoice/create')->with('success', 'Vraag gemaakt!');
    }

    public function show($id)
    {
        $multiplechoice = Multiplechoice::find($id);
        $multiplechoiceoptions = DB::table('multiplechoice_options')->where('multiplechoice_id', '=', $id)->get();
        $connectedsurveys = Multiplechoice::where('multiplechoice_id', $multiplechoice->multiplechoice_id)->get();
        return view('multiplechoice.show')->with([
            'multiplechoice' => $multiplechoice, 
            'multiplechoiceoptions' => $multiplechoiceoptions, 
            'connectedsurveys' => $connectedsurveys
            ]);
    }

    public function edit($id)
    {
        $surveys = DB::table('surveys')->get();
        $multiplechoice = Multiplechoice::find($id);
        
        $allqs = Multiplechoice::where('survey_id', $id)->get();
        
        $connectedsurveys = Multiplechoice::where('multiplechoice_id', $multiplechoice->multiplechoice_id)->get();
        $mpos = DB::table('multiplechoice_options')->where('multiplechoice_id', '=', $id)->get();
        return view('multiplechoice.edit')->with([
            'multiplechoice' => $multiplechoice,
            'surveys' => $surveys,
            'mpos' => $mpos,
            'allqs' => $allqs,
            'connectedsurveys' => $connectedsurveys
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'multiplechoice_name' => 'required'
        ]);

        $multiplechoice = Multiplechoice::find($id);
        $multiplechoice->multiplechoice_name = $request->multiplechoice_name;
        $multiplechoice->survey_id = $request->survey_id;
        $multiplechoice->save();
           
        return redirect('/input')->with('success', 'Vraag aangepast!');
    }

    public function delete($id)
    {
        $multiplechoice_options = MultiplechoiceOptions::where('multiplechoice_id', '=', $id);
        $multiplechoice = Multiplechoice::find($id);
        $multiplechoice_options->delete();
        $multiplechoice->delete();
        return redirect('/input')->with('success', 'Vraag verwijderd!');
    }

    public function add(Request $request)
    {
        $multiplechoice = Multiplechoice::find($request['id']);
        $name = $multiplechoice->multiplechoice_name;

        Multiplechoice::create([
            'survey_id' => $request['survey_id'],
            'multiplechoice_id' => $multiplechoice->multiplechoice_id,
            'multiplechoice_name' => $name
        ]);

        return redirect('/questions')->with('success', 'Vraag toegevoegd aan een vragenlijst!');
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
        return redirect('/multiplechocie')->with('success', 'Open vraag uit vragenlijst verwijderd!');
    }
}
