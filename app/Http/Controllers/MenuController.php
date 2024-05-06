<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Review;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function menu()
    {

        $foods = Food::paginate(20);


        return view('frontend.menu', compact('foods'));
    }

    function showFood($id)
    {
        $food = Food::with('reviews.user')->findOrFail($id);
        // dd($food->reviews);
        return view('frontend.ViewFood', compact('food'));
    }

    function storeReview(Request $request, $id)
    {
        $isExists = Review::where('customer_id',  auth('customer')->id())->where('food_id', $id)->exists();
        if (!$isExists) {

            $review = new Review();
            $review->cmt = $request->cmt;
            $review->review = $request->star;
            $review->customer_id = auth('customer')->id();
            $review->food_id = $id;
            $review->save();
        }
        return back();
    }
}
