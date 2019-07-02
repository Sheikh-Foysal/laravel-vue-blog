<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function add_category(Request $request){

        $this->validate($request,[
            'cat_name'    => 'required|string|min:2',
        ]);

        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->save();
    }

    public function  all_category(){
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ],200);
    }
}
