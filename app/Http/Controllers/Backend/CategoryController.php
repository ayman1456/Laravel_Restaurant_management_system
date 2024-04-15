<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function showCategory(){
        $categories= Category::latest()->get();
        return view('backend.category', compact('categories'));
    }

    function editCategory($id) {
        $categories= Category::latest()->get();
        $editedCategory = Category::find($id);
        return view('backend.category', compact('categories', 'editedCategory'));
    }


    function saveCategory(Request $req,$id=null){
    
        $req->validate([
            'title' => 'required|unique:categories,title,'. $id
        ]);


       $category= Category::findOrNew($id);
       $category->title=$req->title;

       $category->save();
       return back();
    }


    function deleteCategory($id) {
        Category::find($id)->delete();
        return back();
    }
}
