<?php

namespace App\Http\Controllers;
use App\OpenQ;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Survey;

class OutputController extends Controller
{

    public function index()
    {
        return view('output.search');
    }
    public function searchoutputpdf(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $survey = DB::table('surveys')->where('titel', 'LIKE', '%' . $request->searchoutputpdf . "%")->get();
            if ($survey) {
                foreach ($survey as $key => $s) {
                    if ($s->created_at <= $request->dateend && $s->created_at >= $request->datestart) {
                        $newDate = date("d-m-Y", strtotime($s->created_at));
                        $output .= '<tr>' .
                            '<td>' . $newDate . '</td>' .
                            '<td><a href="surveys/show/' . $s->id . '">' . $s->titel . '</a></td>' .
                            '<td>' . $s->beschrijving . '</td>' .
                            //'<td>' . $s->survey_id . '</td>' .
                            '</tr>';
                    }
                }
                return Response($output);
            }
        }
    }

    public function show($id)
    {
        $survey = Survey::find($id);
        $openqs = OpenQ::where('survey_id', $id)->get();
        return view('pdf', ['survey' => $survey], ['openqs' => $openqs]);
    }

    public function downloadPDF($id) {
        $survey = Survey::find($id);
        $openqs = OpenQ::where('survey_id', $id)->get();
        $pdf = PDF::loadView('pdf', ['survey' => $survey], ['openqs' => $openqs]);

        return $pdf->download('test.pdf');
    }
}
