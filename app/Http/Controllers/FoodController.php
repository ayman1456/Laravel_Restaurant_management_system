<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    function showFood(){
        $food= Food::latest()->get();
        return view('backend.food', compact('food'));
    }

    function editFood($id) {
        $food= Food::latest()->get();
        $editedFood = Food::find($id);
        return view('backend.food', compact('food', 'editedFood'));
    }

    function saveFood(Request $req,$id=null){
    
        $req->validate([
            'title' => 'required|unique:food,title,'. $id,
            'price' => 'required',
            'detail' => 'required|min:10'            
        ]);


       $food= Food::findOrNew($id);
       $food->title=$req->title;
       $food->price=$req->price;
       $food->detail=$req->detail;
       $food->image=$req->image;

       $food->save();
       return back();
    }

    function deleteCategory($id) {
        Food::find($id)->delete();
        return back();
    }
}
