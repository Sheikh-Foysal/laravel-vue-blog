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

    public function delete_category($id){
        $category = Category::find($id);
        $category->delete();
    }

    public function edit_category($id){
        $category = Category::find($id);
        return response()->json([
            'category'=>$category
        ],200);
    }

    public function update_category(Request $request, $id){
        $category = Category::find($id);
        $category->cat_name = $request->cat_name;
        $category->save();
    }
}
