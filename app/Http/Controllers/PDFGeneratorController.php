<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\OpenQ;
use PDF;

class PDFGeneratorController extends Controller
{
    public function index() {
        $openqs = $this->get_openqs();
        return view('pdf.index')->with('openqs', $openqs);
    }

    public function get_openqs() {
        $get_openqs = DB::table('openqs')
                    ->get();
        
        return $get_openqs;
    }

    public function pdf() {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->
            convert_openqs_to_html());
        
        return $pdf->stream();
    }

    public function convert_openqs_to_html() {
        $openqs = $this->get_openqs();
        // $pdfoutput = '
        // <div class="container">
        //     <div class="table-responsive">
        //         <table class="table table-bordered">
        //             <thead>
        //                 <tr>
        //                     <th>Open vraag id</th>
        //                     <th>Open vraag</th>
        //                 </tr>
        //             </thead>
        //             <tbody>
        //                 @foreach($openqs as $oq)
        //                     <tr>
        //                         <td>{{$oq->openq_id}}</td>
        //                         <td>{{$oq->openq_name}}</td>
        //                     </tr>
        //                 @endforeach
        //             </tbody>
        //         </table>
        //     </div>
        // </div>
        // ';

        $pdfoutput = '
        <h3 align="center">Open questions</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr>
                <th style="border: 1px solid; padding:12px;" width="20%">OpenQ ID</th>
                <th style="border: 1px solid; padding:12px;" width="30%">OpenQ Name</th>
            </tr>
        ';

        foreach($openqs as $oq){
            $pdfoutput .= '
            <tr>
                <th style="border: 1px solid; padding:12px;" width="10%">' . $oq->openq_id . '</th>
                <th style="border: 1px solid; padding:12px;" width="90%">' . $oq->openq_name . '</th>
            </tr>
            ';

            $pdfoutput .= '</table>';
        }

        // foreach($openqs as $oq){
        //     $pdfoutput .= '<table class="table table-bordered">
        //     <tr>
        //         <td>' . $oq->openq_id . '</td>
        //         <td>' . $oq->openq_name . '</td>
        //     </tr>
        //     ';

        //     $pdfoutput .= '</table>';
        // }

        
        return $pdfoutput;
    }
}
