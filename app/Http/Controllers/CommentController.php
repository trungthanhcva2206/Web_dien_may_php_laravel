<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\comment;


class CommentController extends Controller
{
    public function store(Request $request){
        $comment1 = new comment;
        $user_id = Auth::id();
        $comment1->user_id = $user_id;
        $comment1->product_id = $request->product_id;
        $comment1->comment = $request->message;
        $comment1->star = $request->rating;

        $comment1->save();
        return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi thành công.');
    }
}
