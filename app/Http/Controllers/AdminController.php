<?php

namespace App\Http\Controllers;

use App\Business;
use App\OldBusinessData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Europe/Amsterdam');
    }

    public function windex(Request $request)
    {
        $businesses = DB::table('business')->where($request->column, 'LIKE', '%' . $request->value . '%')->paginate(10);

        return view('admin.index', ['businesses' => $businesses]);
    }

    public function index()
    {
        $businesses = DB::table('business')->paginate(10);

        return view('admin.index', ['businesses' => $businesses]);
    }

    public function create()
    {
        $themes = DB::table('themes')->get();
        $programs = DB::table('programs')->get();
        $housings = DB::table('housings')->get();
        $organisation_types = DB::table('organisation_types')->get();
        $relationships = DB::table('relationships')->get();

        return view('admin.create', ['themes' => $themes, 'programs' => $programs, 'housings' => $housings, 'organisation_types' => $organisation_types, 'relationships' => $relationships]);
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
        $business->Relatie = $request->Relatie;
        $business->Thema = $request->Thema;
        $business->Programma = $request->Programma;
        $business->Huisvesting = $request->Huisvesting;
        $business->Organisatievorm = $request->Organisatievorm;
        $business->Omzet = $request->Omzet;
        $business->created_at = date('y-m-d');
        $business->save();

        return(redirect('/admin'));
    }

    public function edit($id)
    {
        $business = DB::table('business')->find($id);
        $themes = DB::table('themes')->get();
        $programs = DB::table('programs')->get();
        $housings = DB::table('housings')->get();
        $relationships = DB::table('relationships')->get();
        $organisation_types = DB::table('organisation_types')->get();

        return view('admin.edit', ['business' => $business, 'programs' => $programs, 'themes' => $themes, 'housings' => $housings, 'relationships' => $relationships, 'organisation_types' => $organisation_types]);
    }

    public function update(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'archive':
                $this->archive($request, $id);
                break;

            case 'edit':

                $business = Business::find($id);
                $business->Ondernemer = $request->Ondernemer;
                $business->Onderneming = $request->Onderneming;
                $business->Telefoonnummer = $request->Telefoonnummer;
                $business->Plaats = $request->Plaats;
                $business->Email = $request->Email;
                $business->Idee = $request->Idee;
                $business->Jaar = $request->Jaar;
                $business->Relatie = $request->Relatie;
                $business->Thema = $request->Thema;
                $business->Programma = $request->Programma;
                $business->Huisvesting = $request->Huisvesting;
                $business->Organisatievorm = $request->Organisatievorm;
                $business->Omzet = $request->Omzet;
                $business->save();
        }
                return (redirect('/admin'));
    }

    public function delete($id){
        $oldDataCheck = DB::table('old_business_data')->where('business_id', $id)->doesntExist();
        if($oldDataCheck == true) {
            DB::table('business')->delete($id);
        }
        else{
            $oldData = DB::table('old_business_data')->where('business_id', $id)->latest()->first();
            DB::table('business')->delete($id);
            $business = new Business;
            $business->id = $oldData->business_id;
            $business->Ondernemer = $oldData->Ondernemer;
            $business->Onderneming = $oldData->Onderneming;
            $business->Telefoonnummer = $oldData->Telefoonnummer;
            $business->Plaats = $oldData->Plaats;
            $business->Email = $oldData->Email;
            $business->Idee = $oldData->Idee;
            $business->Jaar = $oldData->Jaar;
            $business->Relatie = $oldData->Relatie;
            $business->Thema = $oldData->Thema;
            $business->Programma = $oldData->Programma;
            $business->Huisvesting = $oldData->Huisvesting;
            $business->created_at = $oldData->created_at;
            $business->save();
            OldBusinessData::find($oldData->id)->delete();
        }
       return(redirect('/admin'));
    }

    public function deleteAll($id){
        DB::table('business')->delete($id);
        DB::table('old_business_data')->where('business_id', $id)->delete();

        return(redirect('/admin'));
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function archive(Request $request, $id){
        $oldBusiness = new OldBusinessData();
        $business = Business::find($id);
        $oldBusiness->business_id = $business->id;
        $oldBusiness->Ondernemer = $business->Ondernemer;
        $oldBusiness->Onderneming = $business->Onderneming;
        $oldBusiness->Telefoonnummer = $business->Telefoonnummer;
        $oldBusiness->Plaats = $business->Plaats;
        $oldBusiness->Email = $business->Email;
        $oldBusiness->Idee = $business->Idee;
        $oldBusiness->Jaar = $business->Jaar;
        $oldBusiness->Relatie = $business->Relatie;
        $oldBusiness->Thema = $business->Thema;
        $oldBusiness->Programma = $business->Programma;
        $oldBusiness->Huisvesting = $business->Huisvesting;
        $oldBusiness->created_at = $business->created_at;
        $oldBusiness->save();

        $business->Ondernemer = $request->Ondernemer;
        $business->Onderneming = $request->Onderneming;
        $business->Telefoonnummer = $request->Telefoonnummer;
        $business->Plaats = $request->Plaats;
        $business->Email = $request->Email;
        $business->Idee = $request->Idee;
        $business->Jaar = $request->Jaar;
        $business->Relatie = $request->Relatie;
        $business->Thema = $request->Thema;
        $business->Programma = $request->Programma;
        $business->Huisvesting = $request->Huisvesting;
        $business->save();
    }
}
