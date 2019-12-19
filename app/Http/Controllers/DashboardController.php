<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\HighchartsChart;
use App\Charts\ChartJSChart;
use App\Housing;

use App\Business;

class DashboardController extends Controller
{
    public function housingchart() {

    }

    public function index(){
        // Collect data for housing chart
        $flex_data = Business::where('Huisvesting', 'Flex')->count();
        $loods_data = Business::where('Huisvesting', 'Loodsunit')->count();
        $kantoor_data = Business::where('Huisvesting', 'Kantoor')->count();
        $geen_data = Business::where('Huisvesting', 'Geen')->count();

        // Collect data for programma chart
        $btcmp_data = Business::whereIn('Programma', ['Bootcamp: Lead', 'Bootcamp: Lead kwalificeren', 'Bootcamp, Prospect', 'Bootcamp: Deelnemer', 'Bootcamp: Alumnus'])->count();
        $kick_data = Business::whereIn('Programma', ['Kickstart: Lead', 'Kickstart: Lead kwalificeren', 'Kickstart: Prospect', 'Kickstart: Deelnemer', 'Kickstart: Alumnus'])->count();
        $accel_data = Business::whereIn('Programma', ['Accelerator: Lead', 'Accelerator: Lead kwalificeren', 'Accelerator: Prospect', 'Accelerator: Deelnemer', 'Accelerator: Alumnus'])->count();
        $sul_data = Business::whereIn('Programma', ['Scale up light: Lead', 'Scale up light: Lead kwalificeren', 'Scale up light: Prospect', 'Scale up light: Deelnemer', 'Scale up light: Alumnus'])->count();
        $su_data = Business::whereIn('Programma', ['Scale up: Lead', 'Scale up: Lead kwalificeren', 'Scale up: Prospect', 'Scale up: Deelnemer', 'Scale up: Alumnus'])->count();
        $mw_data = Business::whereIn('Programma', ['Maatwerk: Lead', 'Maatwerk: Lead kwalificeren', 'Maatwerk: Prospect', 'Maatwerk: Deelnemer', 'Maatwerk: Alumnus'])->count();
        $chl_data = Business::whereIn('Programma', ['Challenge: Lead', 'Challenge: Lead kwalificeren', 'Challenge: Prospect', 'Challenge: Deelnemer', 'Challenge: Alumnus'])->count();
        $vdp_data = Business::whereIn('Programma', ['Validatieprogramma: Lead', 'Validatieprogramma: Lead kwalificeren', 'Validatieprogramma: Prospect', 'Validatieprogramma: Deelnemer', 'Validatieprogramma: Alumnus'])->count();
        $geenp_data = Business::where('Programma', 'Geen')->count();
        $pk_koud = Business::where('Programma', 'Parkeerplaats Koud')->count();
        $pk_warm = Business::where('Programma', 'Parkeerplaats Warm')->count();
        $lead_gen = Business::where('Programma', 'Lead genereren')->count();

        // Collect data for programma group chart
        $prog_lead = Business::whereIn('Programma', ['Bootcamp: Lead', 'Kickstart: Lead', 'Accelerator: Lead', 'Scale up light: Lead', 'Scale up: Lead', 'Maatwerk: Lead', 'Challenge: Lead', 'Validatieprogramma: Lead'])->count();
        $prog_leadk = Business::whereIn('Programma', ['Bootcamp: Lead kwalificeren', 'Kickstart: Lead kwalificeren', 'Accelerator: Lead kwalificeren', 'Scale up light: Lead kwalificeren', 'Scale up: Lead kwalificeren', 'Maatwerk: Lead kwalificeren', 'Challenge: Lead kwalificeren', 'Validatieprogramma: Lead kwalificeren'])->count();
        $prog_pros = Business::whereIn('Programma', ['Bootcamp, Prospect', 'Kickstart: Prospect', 'Accelerator: Prospect', 'Scale up light: Prospect', 'Scale up: Prospect', 'Maatwerk: Prospect', 'Challenge: Prospect', 'Validatieprogramma: Prospect'])->count();
        $prog_deel = Business::whereIn('Programma', ['Bootcamp: Deelnemer', 'Kickstart: Deelnemer', 'Accelerator: Deelnemer', 'Scale up light: Deelnemer', 'Scale up: Deelnemer', 'Maatwerk: Deelnemer', 'Challenge: Deelnemer', 'Validatieprogramma: Deelnemer'])->count();
        $prog_alum = Business::whereIn('Programma', ['Bootcamp: Alumnus', 'Kickstart: Alumnus', 'Accelerator: Alumnus', 'Scale up light: Alumnus', 'Scale up: Alumnus', 'Maatwerk: Alumnus', 'Challenge: Alumnus', 'Validatieprogramma: Alumnus'])->count();

        // Collect data for organisation types chart
        $student_start = Business::where('Organisatievorm', 'Student starter')->count();
        $idee_eig = Business::where('Organisatievorm', 'Idee eigenaar')->count();
        $startup = Business::where('Organisatievorm', 'Startup')->count();
        $scaleup = Business::where('Organisatievorm', 'Scaleup')->count();
        $mkb = Business::where('Organisatievorm', 'MKB onderneming')->count();
        $grootb = Business::where('Organisatievorm', 'Grootbedrijf')->count();
        $overheidin = Business::where('Organisatievorm', 'Overheidsinstelling')->count();

        // Collect data for themes
        $circbio = Business::where('Thema', 'Circulair & Biobased')->count();
        $watener = Business::where('Thema', 'Water & Energie')->count();
        $socimp = Business::where('Thema', 'Social Impact')->count();
        $indusmain = Business::where('Thema', 'Industrie & Maintenance')->count();
        $techinn = Business::where('Thema', 'Teschnisch Innovatief')->count();
        $havlog = Business::where('Thema', 'Haven & Logistiek')->count();
        $agrofoodlb = Business::where('Thema', 'Agro, Food & Landbouw')->count();
        $ict = Business::where('Thema', 'ICT/app/platform')->count();
        $eneroffshore = Business::where('Thema', 'Energie & Offshore')->count();
        $logmain = Business::where('Thema', 'Logistiek & Maintenance')->count();
        $zorggezon = Business::where('Thema', 'Zorg en Gezondheid')->count();
        $toervrije = Business::where('Thema', 'Toerisme en vrijetijd')->count();
        $havmari = Business::where('Thema', 'Haven & Maritiem')->count();
        $chembio = Business::where('Thema', 'Chemie en Bioindustrie')->count();
        $biobased = Business::where('Thema', 'Biobased')->count();
        $dienstover = Business::where('Thema', 'Zakelijke dienstverlening en overheid')->count();
        $overig = Business::where('Thema', 'Overig')->count();

        $themachart = new HighchartsChart;
        $themachart->labels(['Circulair & Biobased', 'Water & Energie', 'Social Impact', 'Industrie & Maintenance', 'Teschnisch Innovatief', 'Haven & Logistiek', 'Agro, Food & Landbouw', 'ICT/app/platform', 'Energie & Offshore', 'Logistiek & Maintenance', 'Zorg en Gezondheid', 'Toerisme en vrijetijd', 'Haven & Maritiem', 'Chemie en Bioindustrie', 'Biobased', 'Zakelijke dienstverlening en overheid', 'Overig'])
        ->height(350)->width(400)
        ->dataset('Thema', 'bar', [$circbio, $watener, $socimp, $indusmain, $techinn, $havlog, $agrofoodlb, $ict, $eneroffshore, $logmain, $zorggezon, $toervrije, $havmari, $chembio, $biobased, $dienstover, $overig])
        ->options([
            'color' => 'navy',
        ]);

        // Initiate and customize housing chart
        $housingchart = new HighchartsChart;
        $housingchart->labels(['Flex', 'Loodsunit', 'Kantoor', 'Geen'])->height(175)->width(350)
            ->dataset('Huisvesting', 'bar', [$flex_data, $loods_data, $kantoor_data, $geen_data])
            ->options([
                'color' => 'navy',
            ]);

        // Initiate and customize programma chart
        $programmachart = new HighchartsChart;
        $programmachart->labels(['Bootcamp', ' Kickstart', 'Accelerator', ' Scale up light', 'Scale up', 'Maatwerk', 'Challenge', 'Validatieprogramma', ' Parkeerplaats Koud', 'Parkeerplaats Warm', 'Lead genereren', 'Geen'])
        ->height(350)->width(400)
        ->dataset('Programmas', 'bar', [$btcmp_data, $kick_data, $accel_data, $sul_data, $su_data, $mw_data, $chl_data, $vdp_data, $geenp_data, $pk_koud, $pk_warm, $lead_gen])
        ->options([
            'color' => 'navy',
        ]);

        $progroupchart = new HighchartsChart;
        $progroupchart->labels(['Lead', 'Lead kwalificeren', 'Prospect', 'Deelnemer', 'Alumnus', 'Geen'])
        ->height(350)->width(400)
        ->dataset('Programma fase', 'bar', [$prog_lead, $prog_leadk, $prog_pros, $prog_deel, $prog_alum])
        ->options([
            'color' => 'navy',
        ]);

        $orgtypechart = new HighchartsChart;
        $orgtypechart->labels(['Student starter', 'Idee eigenaar', 'Startup', 'Scaleup', 'MKB onderneming', 'Grootbedrijf', 'Overhuidsinstelling'])
        ->height(350)->width(400)
        ->dataset('Organisatievorm', 'bar', [$student_start, $idee_eig, $startup, $scaleup, $mkb, $grootb, $overheidin])
        ->options([
            'color' => 'navy',
        ]);



        $businesses = DB::table('business')->get();

        return view('dashboard/index')->with([
            'businesses' => $businesses,
            'housingchart' => $housingchart,
            'programmachart' => $programmachart,
            'progroupchart' => $progroupchart,
            'orgtypechart' => $orgtypechart,
            'themachart' => $themachart,
            ]);
    }
}
