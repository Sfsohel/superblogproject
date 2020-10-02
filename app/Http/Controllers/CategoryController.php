<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
   public function add_category(Request $request)
   {
        //return $request->all();
        $this->validate($request, [
            'cat_name' => 'required|min:2|max:50'
        ]);
       $category = new Category();
       $category->cat_name = $request->cat_name;
       $category->save();
       return ['message'=>'Ok'];

   }
   public function getAllCategory()
   {
       $categories= Category::all();
      return response()->json([
            'categories'=>$categories
        ],200);
   }
   public function deleteCategory($id)
   {
       $category = Category::find($id);
       $category->delete();
   }
   public function editCategory( $id)
   {
      //return $id;
      $category =Category::find($id);
      return response()->json([
           'category' => $category
      ],200);
   }
   public function updateCategory(Request $request ,$id)
   {
        $this->validate($request, [
            'cat_name' => 'required|min:2|max:50'
        ]);
        $category = Category::find($id);
        $category->cat_name = $request->cat_name;
        $category->save();
   }
}
