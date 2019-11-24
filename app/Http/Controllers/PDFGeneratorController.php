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
}
