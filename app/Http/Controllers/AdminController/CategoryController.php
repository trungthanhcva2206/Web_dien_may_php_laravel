<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\categories;

class CategoryController extends Controller
{
    public function show()
    {
        $cates = categories::all(); 

        return view('./Admin/cate',compact('cates'));
    }

    public function show_details($id){
        
        $cate = categories::findOrFail($id);
        $products = $cate->cate_detail;
       
        return view('./Admin/detail_cate', compact('cate','products'));
    }

    public function ViewAdd1(){
        return view('./Admin/add_cate');
    }

    public function AddCate(Request $request){
        $category = new categories;
        $category->Name = $request->fname;

        $category->save();
        return redirect()->route('admin.cate');
    }
    public function delete($id)
    {
        $categories = categories::find($id);
        
        


        $categories->delete();

        return redirect()-> action([CategoryController::class,'show'])->with('success','Dữ liệu xóa thành công.');
        // return response()->json(['message' => 'Nhân viên đã được xóa thành công']);
    }

}
