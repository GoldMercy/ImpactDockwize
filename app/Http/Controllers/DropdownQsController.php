<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DropdownQ;
use App\QOption;
use Illuminate\Support\Facades\DB;

class DropdownQsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dropdownqs = DB::table('dropdownqs')->paginate(20);
        return view('dropdownqs.index')->with('dropdownqs', $dropdownqs);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qoptions = QOption::all();
        return view('dropdownqs.create')->with([
            'qoptions' => $qoptions
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
            'dropdownq_name' => 'required',
        ]);
        
        $dropdownq = new DropdownQ;
        $dropdownq->dropdownq_name = $request->dropdownq_name;
        $dropdownq->save();

        return redirect('/dropdownqs')->with('success', 'Vraag gemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dropdownq = DropdownQ::find($id);
        $qoptions = QOption::where('dropdownq_fk', $id)->get();
        return view('dropdownqs.show', ['dropdownq' => $dropdownq], ['qoptions' => $qoptions]);

        // $dropdownq = DropdownQ::find($id);
        // return view('dropdownqs.show')->with('dropdownq', $dropdownq);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dropdownq = DropdownQ::find($id);
        return view('dropdownqs.edit')->with('dropdownq', $dropdownq);
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
            'dropdownq_name' => 'required'
        ]);

        $dropdownq = DropdownQ::find($id);
        $dropdownq->dropdownq_name = $request->dropdownq_name;
        $dropdownq->save();
        
           
        return redirect('/dropdownqs')->with('success', 'Vraag aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $dropdownq = DropdownQ::find($id);
        $dropdownq->delete();
        return redirect('/dropdownqs')->with('success', 'Vraag verwijderd!');
    }
}
