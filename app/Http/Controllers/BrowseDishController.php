<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Util;
use App\Models\Dish;
use App\Models\CartDetail;
use Illuminate\Http\Request;

class BrowseDishController extends Controller
{

    public function index()
    {
        $browseDishs = Dish::query()
            ->leftJoin('Category', 'Dish.category_id', '=', 'Category.id')
            ->select('Dish.image', 'Dish.id', 'Dish.name', 'Dish.price', 'Category.name as category_name', 'Dish.description')
            ->get();
        return view('browseDishs.index', ['browseDishs' => $browseDishs]);
    }

    public function show($id)
    {
        $browseDish = Dish::query()
            ->leftJoin('Category', 'Dish.category_id', 'Category.id')
            ->select('Dish.id', 'Dish.name', 'Dish.price', 'Dish.category_id', 'Dish.image', 'Category.name as category_name', 'Dish.description')
            ->where('Dish.id', $id)
            ->first();
        return view('browseDishs.show', ['browseDish' => $browseDish, 'ref' => Util::getRef('/browse-menu')]);
    }

    public function addToCart(Request $request)
    {
        $existingCartDetail = CartDetail::where('cart_id', Auth::id())
            ->where('dish_id', $request->input('dish_id'))
            ->first();

        if ($existingCartDetail) {
            // If the cart detail exists, increment the quantity
            $existingCartDetail->increment('qty');
        } else {
            // If the cart detail doesn't exist, create a new one
            $cartDetail = CartDetail::create([
                'cart_id' => Auth::id(),
                'dish_id' => $request->input('dish_id'),
                'qty' => 1
            ]);
        }

        return redirect('/cart');
    }
}
