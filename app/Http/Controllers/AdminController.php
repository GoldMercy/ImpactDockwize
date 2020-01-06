<?php

namespace App\Http\Controllers;

use App\Business;
use App\Exports\BusinessExport;
use App\OldBusinessData;
use App\Survey;
use App\SurveyStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Charts\HighchartsChart;

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

        return view('admin.index')->with('businesses', $businesses);
    }

    public function create()
    {
        $themes = DB::table('themes')->get();
        $programs = DB::table('programs')->get();
        $housings = DB::table('housings')->get();
        $revenues = DB::table('revenues')->get();
        $organisation_types = DB::table('organisation_types')->get();
        $relationships = DB::table('relationships')->get();

        return view('admin.create', ['themes' => $themes, 'programs' => $programs, 'housings' => $housings, 'organisation_types' => $organisation_types, 'relationships' => $relationships, 'revenues' => $revenues]);
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

        return(redirect()->back());
    }

    public function edit($id)
    {
        $business = Business::find($id);
        $themes = DB::table('themes')->get();
        $programs = DB::table('programs')->get();
        $housings = DB::table('housings')->get();
        $surveys = DB::table('surveys')->where('business_id', $id)->get();
        $surstats = DB::table('survey_statuses')->get();
        $relationships = DB::table('relationships')->get();
        $organisation_types = DB::table('organisation_types')->get();

        return view('admin.edit')->with([
            'business' => $business, 
            'surveys' => $surveys, 
            'surstats' => $surstats, 
            'programs' => $programs, 
            'themes' => $themes, 
            'housings' => $housings,
            'relationships' => $relationships,
            'organisation_types' => $organisation_types
            ]);
    }

    public function update(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'archive':
                $this->archive($request, $id);
                return(redirect()->back()->with('success', 'Nieuw meetpunt opgeslagen!'));
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
                return (redirect()->back()->with('success', 'Onderneming aangepast!'));
    }

    public function delete($id){
        $oldDataCheck = DB::table('old_business_data')->where('business_id', $id)->doesntExist();
        if($oldDataCheck == true) {
            DB::table('business')->delete($id);
            return(redirect('/admin')->with('success', 'Onderneming verwijderd!'));
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
            $business->Organisatievorm = $oldData->Organisatievorm;
            $business->Omzet = $oldData->Omzet;
            $business->created_at = $oldData->created_at;
            $business->save();
            OldBusinessData::find($oldData->id)->delete();

            return(redirect('/admin')->with('success', 'Onderneming volledig verwijderd!'));
        }
       return(redirect('/admin')->with('success', 'Bedrijf verwijderd!'));
    }

    public function deleteAll($id){
        DB::table('business')->delete($id);
        DB::table('old_business_data')->where('business_id', $id)->delete();

        return(redirect('/admin')->with('success', 'Alle data verwijderd!'));
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
        $oldBusiness->Organisatievorm = $business->Organisatievorm;
        $oldBusiness->Omzet = $business->Omzet;
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
        $business->Organisatievorm = $request->Organisatievorm;
        $business->Omzet = $request->Omzet;
        $business->created_at = date('Y-m-d');
        $business->save();
    }

    public function show(Request $request, $id) {
        $business = Business::find($id);
        $surveys = Survey::where('business_id', '=',  $id);
        $surstats = SurveyStatus::where('business_name', $business->Onderneming)->get();

        return view('admin.show')->with([
            'business' => $business,
            'surveys' => $surveys,
            'surstats' => $surstats,
            ]);
    }
    public function export()
    {
        return Excel::download(new BusinessExport(), 'Business.xlsx');
    }

    public function graph($id){
        $revenue = DB::table('old_business_data')->where('business_id', $id)->orderBy('created_at', 'asc')->get();
        $business = DB::table('business')->find($id);

        $omzet = [];
        $dates = [];
        foreach ($revenue as $rev){
            if($rev->Omzet == '€0 - €100.000'){
                $avgrev = 50000;
            }
            elseif($rev->Omzet == '€100.000 - €500.000'){
                $avgrev = 300000;
            }
            elseif($rev->Omzet == '€500.000 - €1.000.000'){
                $avgrev = 750000;
            }
            elseif($rev->Omzet == '> €1.000.000'){
                $avgrev = 1000000;
            }
            else{
                $avgrev = (int)$rev->Omzet;
            }
            array_push($omzet, $avgrev);
            array_push($dates, date('d-m-Y', strtotime($rev->created_at)));
        }

        $revenuechart = new HighchartsChart;
        $revenuechart->height(700)->width(800)->labels($dates)
            ->dataset('Omzet', 'line', $omzet)
            ->options([
                'color' => 'navy',
            ]);
        $revenuechart->dataset('Werknemers', 'line', [1,3,9]);

        return view('admin/graph')->with([
            'revenuechart' => $revenuechart,
            'business' => $business,
        ]);
    }
}
