<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\feed_back;

class ContactUsController extends Controller
{
    //
    public function show()
    {
        return view('./User/contact_us');
    }

    public function add(Request $request){
        $feedback = new feed_back;
        $feedback->full_name = $request->name;
        $feedback->email = $request->email;
        $feedback->message = $request->message;
        $feedback->save();
        return redirect()->route('user.contact_us');
    }
}
