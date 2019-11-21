<?php

namespace App\Http\Controllers;

use App\Multiplechoice;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use App\DropdownQ;
use App\QOption;
use App\Survey;
use App\MultiplechoiceOptions;
use Illuminate\Support\Facades\DB;

class MultiplechoiceController extends Controller
{
    public function index()
    {
        $multiplechoice = DB::table('multiplechoice')->paginate(20);
        return view('multiplechoice.index')->with('multiplechoice', $multiplechoice);;
    }

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
        $multiplechoice->multiplechoice_name = $request->multiplechoice_name;
        $multiplechoice->survey_id = $request->survey_id;
        $multiplechoice->save();

        $multiplechoice_options = new MultiplechoiceOptions;
        $options[] = $request->toArray();
        array_pop($options[0]);
        array_shift($options[0]);
        $multiplechoice_options->multiplechoice_option = implode(', ',$options[0]);
        $multiplechoice_options->multiplechoice_id = $multiplechoice->multiplechoice_id;
        $multiplechoice_options->save();

        return redirect('/multiplechoice')->with('success', 'Vraag gemaakt!');
    }


    public function show($id)
    {
        $multiplechoice = Multiplechoice::find($id);
        $multiplechoiceoptions = DB::table('multiplechoice_options')->where('multiplechoice_id', '=', $id)->get();
        return view('multiplechoice.show', ['multiplechoice' => $multiplechoice], ['multiplechoiceoptions' => $multiplechoiceoptions]);
    }

    public function edit($id)
    {
        $surveys = DB::table('surveys')->get();
        $multiplechoice = Multiplechoice::find($id);
        $multiplechoiceoptions = DB::table('multiplechoice_options')->where('multiplechoice_id', '=', $id)->get()->first();
        $options = explode(', ' , $multiplechoiceoptions->multiplechoice_option);
        return view('multiplechoice.edit')->with(['multiplechoice' => $multiplechoice, 'surveys' => $surveys, 'options' => $options]);
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

        $multiplechoice_options = MultiplechoiceOptions::where('multiplechoice_id', '=', $id)->first();
        $options[] = $request->toArray();
        array_pop($options[0]);
        array_shift($options[0]);
        array_shift($options[0]);
        $multiplechoice_options->multiplechoice_option = implode(', ',$options[0]);
        $multiplechoice_options->save();
           
        return redirect('/multiplechoice')->with('success', 'Vraag aangepast!');
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
}
