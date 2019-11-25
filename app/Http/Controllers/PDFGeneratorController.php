<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\OpenQ;
use App\ScaleQ;
use PDF;

class PDFGeneratorController extends Controller
{
    public function index() {
        return view('pdf.index');
    }

    public function generalpdf() {
        $pdf = \App::make('dompdf.wrapper');

        $openqs = DB::table('openqs')->get();
        $scaleqs = DB::table('scaleqs')->get();

        $pdf = PDF::loadView('pdf.generalpdf', compact('openqs', 'scaleqs'));      
        return $pdf->stream('dockwize.generalpdf');
    }

    public function housingpdf() {
        $pdf = \App::make('dompdf.wrapper');

        $pdf = PDF::loadView('pdf.housingpdf');      
        return $pdf->stream('dockwize.housingpdf');
    }

    public function impulspdf() {
        $pdf = \App::make('dompdf.wrapper');

        $pdf = PDF::loadView('pdf.impulspdf');      
        return $pdf->stream('dockwize.impulspdf');
    }

    public function programpdf() {
        $pdf = \App::make('dompdf.wrapper');

        $pdf = PDF::loadView('pdf.programpdf');      
        return $pdf->stream('dockwize.programpdf');
    }
}
