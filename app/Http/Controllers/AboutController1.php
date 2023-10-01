<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController1 extends Controller
{
    public function show(){
        return view('/User/about');
    }
}
