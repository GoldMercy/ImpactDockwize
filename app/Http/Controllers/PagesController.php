<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function input(){
        return view('pages.input');
    }

    public function output(){
        return view('pages.output');
    }

}
