<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function input(){
        return view('pages.input');
    }

    public function output(){
        return view('pages.output');
    }

    public function questions(){
        return view('questions.index');
    }

}
