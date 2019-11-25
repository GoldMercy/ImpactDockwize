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

    // public function convert_openqs_to_html() {
    //     $openqs = $this->get_openqs();
    //     $pdfoutput = '
    //     <head>
    //     <link rel="stylesheet" type="text/css" href="app/Http/Controllers/pdf.css">
    //     </head>
    //     <h3>Open questions</h3>
    //     <table width="100%" style="border-collapse: collapse; border: 0px;">
    //         <tr>
    //             <th style="border: 1px solid; padding:12px;" width="20%">OpenQ ID</th>
    //             <th style="border: 1px solid; padding:12px;" width="30%">OpenQ Name</th>
    //         </tr>
    //     ';

    //     foreach($openqs as $oq){
    //         $pdfoutput .= '
    //         <tr>
    //             <th style="border: 1px solid; padding:12px;" width="10%">' . $oq->openq_id . '</th>
    //             <th style="border: 1px solid; padding:12px;" width="90%">' . $oq->openq_name . '</th>
    //         </tr>
    //         ';

    //         $pdfoutput .= '</table>';
    //     }
        
    //     return $pdfoutput;
    // }
}
