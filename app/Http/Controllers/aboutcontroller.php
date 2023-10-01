<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutcontroller extends Controller
{
    public function show(){
        return view('/User/about');
    }
}
