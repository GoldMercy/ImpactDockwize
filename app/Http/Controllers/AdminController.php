<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $businesses = DB::table('business')->paginate(10);

        return view('admin.index', ['businesses' => $businesses]);
    }
}
