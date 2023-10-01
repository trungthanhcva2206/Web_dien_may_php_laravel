<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\feed_back;

class FeedbackController extends Controller
{
    public function show(){
        $feedbacks = feed_back::all();

        return view('./Admin/feed_back',compact('feedbacks'));
    }

    public function show_details($id){
        
        $feedbacks = feed_back::findOrFail($id);
        return view('./Admin/detail_feedback', compact('feedbacks'));
    }
}
