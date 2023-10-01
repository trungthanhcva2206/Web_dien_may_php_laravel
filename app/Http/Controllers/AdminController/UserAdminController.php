<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserAdminController extends Controller
{

    public function create()
    {
        $user_admin = User::where('role','admin')->get();
        return view('./Admin/user_admin', compact('user_admin'));
    }

    public function delete($id)
    {
        $user_admin = User::find($id);
        
        


        $user_admin->delete();

        return redirect()-> action([UserAdminController::class,'create'])->with('success','Dữ liệu xóa thành công.');
        // return response()->json(['message' => 'Nhân viên đã được xóa thành công']);
    }

    public function show_details($id){
        
        $user_admin = User::findOrFail($id);
        return view('./Admin/detail_user_admin', compact('user_admin'));
    }

    public function ViewAdd(){
        return view('./Admin/add_user');
    }

    public function AddUser(Request $request){
        $user1 = new User;
        $user1->name = $request->fname;
        $user1->email = $request->email;
        $user1->gender = $request->gender;
        $user1->address = $request->address;
        $user1->date_of_birth = $request->date;
        $user1->phone = $request->phone;
        $user1->password = Hash::make($request['password']);
        $user1->role = 'admin';
        $img_link = $request->file('img_link');
        $storePath = $img_link->move('image', $img_link->getClientOriginalName());
        $user1->img_link = $storePath;

        $user1->save();
        return redirect()->route('admin.user_add');
    }

    public function ViewEdit($id){
        $user = User::findOrFail($id);
        return view('./Admin/edit_user', compact('user'));
    }

    public function Update(Request $request, $id){
        $user1 = User::find($id);
        $user1->name = $request->fname;
        $user1->email = $request->email;
        $user1->gender = $request->gender;
        $user1->address = $request->address;
        $user1->date_of_birth = $request->date;
        $user1->phone = $request->phone;
        $user1->level = $request->level;
        if($request->img_link){
            $img_link = $request->img_link;
            $storePath = $img_link->move('image', $img_link->getClientOriginalName());
            $user1->img_link = $storePath;
        }
        $user1->save();
        return redirect()->action([UserAdminController::class, 'create']);
    }
}
