<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $businesses = DB::table('business')->get();

        return view('dashboard/index', ['businesses' => $businesses]);
    }
}
