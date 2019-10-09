<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $businesses = DB::table('business')->paginate(10);

        return view('admin.index', ['businesses' => $businesses]);
    }

    public function create()
    {

        return view('admin.create');
    }

    public function store(Request $request)
    {
        $business = new Business;
        $business->Ondernemer = $request->Ondernemer;
        $business->Onderneming = $request->Onderneming;
        $business->Telefoonnummer = $request->Telefoonnummer;
        $business->Plaats = $request->Plaats;
        $business->Email = $request->Email;
        $business->Idee = $request->Idee;
        $business->Jaar = $request->Jaar;
        $business->Doelgroep = $request->Doelgroep;
        $business->Thema = $request->Thema;
        $business->Programma = $request->Programma;
        $business->save();

        return(redirect('/admin'));
    }

    public function edit($id)
    {
        $business = DB::table('business')->find($id);

        return view('admin.edit', ['business' => $business]);
    }

    public function update(Request $request, $id)
    {
        $business = Business::find($id);
        $business->Ondernemer = $request->Ondernemer;
        $business->Onderneming = $request->Onderneming;
        $business->Telefoonnummer = $request->Telefoonnummer;
        $business->Plaats = $request->Plaats;
        $business->Email = $request->Email;
        $business->Idee = $request->Idee;
        $business->Jaar = $request->Jaar;
        $business->Doelgroep = $request->Doelgroep;
        $business->Thema = $request->Thema;
        $business->Programma = $request->Programma;
        $business->save();

        return(redirect('/admin'));
    }

    public function delete($id){
        $business = Business::find($id);
        $business->delete();

       return(redirect('/admin'));
    }
}
