<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\categories;

class ProductController extends Controller
{
    //


    public function show_home_page()
    {
        $like_product = product::where('featured', 'Like') ->take(12)-> get();
        $accessories = product::where('category_id', 7) ->take(12)-> get();
        $tree_product = product::where('category_id', '!=', 7) ->take(12)->get();
        $categories = categories::all();

        return view('./User/home_page', compact('like_product', 'accessories', 'tree_product','categories'));
    }

    public function show_product_detail($id){
        $product = product::with('images','attributeValues.attribute','comments.user')->findOrFail($id);
        $attributeValues = $product->attributeValues;
        $comments = $product->comments;
        $reviewCount = $comments->count();
        $binhluan = $product->comments->whereNotNull('comment');
        $dembinhluan = $binhluan ->count();
        $totalStars = 0;
    foreach ($comments as $comment) {
        $totalStars += $comment->star;
    }

    $averageRating = $reviewCount > 0 ? round($totalStars / $reviewCount) : 0;
        return view('User.product_detail', compact('product', 'attributeValues','comments','reviewCount','averageRating','dembinhluan'));
    }
    
}
