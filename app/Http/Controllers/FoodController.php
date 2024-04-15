<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    function showFood()
    {
        $food = Food::with('categories:title')->latest()->get();

        $categories = Category::select('id', 'title')->get();

        return view('backend.food', compact('food', 'categories'));
    }

    function editFood($id)
    {
        $food = Food::with('categories:title')->latest()->get();

        $categories = Category::select('id', 'title')->get();
        $editedFood = Food::find($id);
        return view('backend.food', compact('food', 'editedFood', 'categories'));
    }

    function saveFood(Request $req, $id = null)
    {


        $req->validate([
            'title' => 'required|unique:food,title,' . $id,
            'price' => 'required',
            'detail' => 'required|min:10'
        ]);


        $food = Food::findOrNew($id);
        $food->title = $req->title;
        $food->price = $req->price;
        $food->detail = $req->detail;
        if ($req->hasFile('image')) {
            $fileName = $req->image->store('foods',  'public');
            $food->image = $fileName;
        }
        $food->save();
        $food->categories()->sync($req->categories);
        return back();
    }

    function deleteCategory($id)
    {
        Food::find($id)->delete();
        return back();
    }
}
