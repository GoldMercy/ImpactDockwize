<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        return view('admin.search');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $businesses=DB::table('old_business_data')->where('Onderneming','LIKE','%'.$request->search."%")->get();
            if($businesses)
            {
                foreach ($businesses as $key => $business) {
                    $newDate = date("d-m-Y h:i:s", strtotime($business->created_at));
                    $output.='<tr>'.
                        '<td>'.$newDate.'</td>'.
                        '<td>'.$business->Ondernemer.'</td>'.
                        '<td>'.$business->Onderneming.'</td>'.
                        '<td>'.$business->Telefoonnummer.'</td>'.
                        '<td>'.$business->Email.'</td>'.
                        '<td>'.$business->Plaats.'</td>'.
                        '<td>'.$business->Idee.'</td>'.
                        '<td>'.$business->Jaar.'</td>'.
                        '<td>'.$business->Thema.'</td>'.
                        '<td>'.$business->Doelgroep.'</td>'.
                        '<td>'.$business->Programma.'</td>'.
                        '</tr>';
                }
                return Response($output);
            }
        }
    }
}
