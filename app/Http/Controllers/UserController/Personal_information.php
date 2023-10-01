<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class Personal_information extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();


        return view('/User/personal_information', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->input('fname');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->address = $request->input('address');
        $user->date_of_birth = $request->input('date');
        $user->phone = $request->input('phone');
        $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    public function updateAvatar(Request $request)
{
    
    $img_link = $request->img_link;
    $storePath = $img_link->move('image', $img_link->getClientOriginalName());
    $user = auth()->user();

    $user->img_link = $storePath;
    
    $user->save();
    return redirect()->back();
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
