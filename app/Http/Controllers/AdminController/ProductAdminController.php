<?php

namespace App\Http\Controllers\AdminController;

use App\Models\product;
use App\Models\categories;
use App\Models\attribute;
use App\Models\image;
use App\Models\attribute_value;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Exception;

class ProductAdminController extends Controller
{

    public function show(){
        $products = product::all(); 
        // $nhanviens = $nhanviens->get();
        return view('./Admin/product_list',compact('products'));
    }
    public function show_details($id){
        
        $product = product::findOrFail($id);
        // $pageTitle = 'Thông tin nhân viên';
        $categoryName = categories::where('id', $product->category_id)->value('Name');
        return view('./Admin/detai_pr', compact('product', 'categoryName'));
    }
    public function delete($id)
    {
        $product = product::find($id);
        
        // Storage::delete('public/image/nhanvien/' . $product->img_link);
        


        $product->delete();

        return redirect()-> action([ProductAdminController::class,'show'])->with('success','Dữ liệu xóa thành công.');
        // return response()->json(['message' => 'Nhân viên đã được xóa thành công']);
    }
    public function ViewAddCate(){
        // Lấy danh sách tất cả danh mục
        $categories = categories::all(); 
    
        // Tạo một mảng để lưu số lượng sản phẩm cho mỗi danh mục
        $productCounts = [];
    
        // Duyệt qua danh sách danh mục và tính số lượng sản phẩm cho mỗi danh mục
        foreach ($categories as $category) {
            $productCount = product::where('category_id', $category->id)->count();
            $productCounts[$category->id] = $productCount;
        }
    
        return view('Admin.product_cate_add', compact('categories', 'productCounts'));
    }

    public function ViewAdd($id){
        $categories = categories::find($id);
        return view('./Admin/product_add',compact('categories'));
    }

    public function product_add2(Request $request)
{
    // Nhận dữ liệu từ biểu mẫu
    $productName = $request->input('product_name');
    $productDescription = $request->input('description');
    $productPrice = $request->input('price');
    $productQuantity = $request->input('quantity');
    $category_id = $request->input('category_id');
    $attributeCount = $request->input('attribute_count');
    $attributeNames = $request->input('attribute_name');
    $attributeValues = $request->input('attribute_value');

    // Tạo sản phẩm và thiết lập các thuộc tính
    $product = new product();
    $product->product_name = $productName;
    $product->description = $productDescription;
    $product->price = $productPrice;
    $product->quantity = $productQuantity;
    $product->category_id = $category_id;
    // Thiết lập các thuộc tính khác của sản phẩm
    $product->save();

    $imagePaths = [];
    if ($request->hasFile('img_link')) {
        $imageFiles = $request->file('img_link');
        foreach ($imageFiles as $imageFile) {
            $storePath = $imageFile->move('image', $imageFile->getClientOriginalName());
            $imagePaths[] = $storePath;

            $image = new image();
            $image->img_link = $storePath;
            $image->product_id = $product->id;
            $image->save();
        }
    }

    // Duyệt qua các thông số kỹ thuật và giá trị và lưu vào bảng "attribute" và "attribute_value"
    for ($i = 0; $i < $attributeCount; $i++) {
        // Tạo thông số kỹ thuật
        $attribute = new attribute();
        $attribute->attribute_name = $attributeNames[$i];
        $attribute->category_id = $category_id;
        // Thiết lập các thuộc tính khác của thông số kỹ thuật
        $attribute->save();

        // Tạo giá trị của thông số kỹ thuật và liên kết với sản phẩm và thông số kỹ thuật
        $attributeValue = new attribute_value();
        $attributeValue->product_id = $product->id;
        $attributeValue->attribute_id = $attribute->id;
        $attributeValue->value = $attributeValues[$i];
        // Thiết lập các thuộc tính khác của giá trị thông số kỹ thuật
        $attributeValue->save();
    }

    // Redirect hoặc thực hiện các hành động khác sau khi thêm dữ liệu

    // Ví dụ redirect về trang danh sách sản phẩm
    return redirect()->route('admin.product')->with('success', 'Thêm sản phẩm thành công');
}

public function ViewEdit($id){
    $product = product::findOrFail($id);
    $attributeData = $product->attributeValues->map(function ($attributeValue) {
        return [
            'attribute_name' => $attributeValue->attribute->attribute_name,
            'value' => $attributeValue->value,
        ];
    });
    return view('./Admin/product_edit',compact('product','attributeData'));
}

public function Update(Request $request, $id){
    $product = product::find($id);
    $product->product_name = $request->product_name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->save();
    $attributeNames = $request->input('attribute_name');
    $attributeValues = $request->input('attribute_value');
    
    
    if (!empty($attributeNames) && !empty($attributeValues)) {
        foreach ($product->attributeValues as $index => $attributeValue) {
            if (isset($attributeNames[$index]) && isset($attributeValues[$index])) {
                $attributeValue->attribute->attribute_name = $attributeNames[$index];
                $attributeValue->value = $attributeValues[$index];
                $attributeValue->attribute->save();
                $attributeValue->save();
            }
        }
    }
    return redirect()->back();
}

public function product_add3(Request $request,$id)
{
    $product = product::find($id);
    $attributeCount = $request->input('attribute_count');
    $attributeNames = $request->input('attribute_name');
    $attributeValues = $request->input('attribute_value');


    $imagePaths = [];
    if ($request->hasFile('img_link')) {
        $imageFiles = $request->file('img_link');
        foreach ($imageFiles as $imageFile) {
            $storePath = $imageFile->move('image', $imageFile->getClientOriginalName());
            $imagePaths[] = $storePath;

            $image = new image();
            $image->img_link = $storePath;
            $image->product_id = $product->id;
            $image->save();
        }
    }

    // Duyệt qua các thông số kỹ thuật và giá trị và lưu vào bảng "attribute" và "attribute_value"
    for ($i = 0; $i < $attributeCount; $i++) {
        // Tạo thông số kỹ thuật
        $attribute = new attribute();
        $attribute->attribute_name = $attributeNames[$i];
        $attribute->category_id = $product->category_id;
        // Thiết lập các thuộc tính khác của thông số kỹ thuật
        $attribute->save();

        // Tạo giá trị của thông số kỹ thuật và liên kết với sản phẩm và thông số kỹ thuật
        $attributeValue = new attribute_value();
        $attributeValue->product_id = $product->id;
        $attributeValue->attribute_id = $attribute->id;
        $attributeValue->value = $attributeValues[$i];
        // Thiết lập các thuộc tính khác của giá trị thông số kỹ thuật
        $attributeValue->save();
    }

    // Redirect hoặc thực hiện các hành động khác sau khi thêm dữ liệu

    // Ví dụ redirect về trang danh sách sản phẩm
    return redirect()->back();
}
    

}
