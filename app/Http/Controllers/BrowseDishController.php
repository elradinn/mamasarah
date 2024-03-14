<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Util;
use App\Models\Dish;
use App\Models\CartHeader;
use App\Models\CartDetail;
use Illuminate\Http\Request;

class BrowseDishController extends Controller {

    public function index()
    {
        $size = request()->input('size') ? request()->input('size') : 10;
        $sort = request()->input('sort') ? request()->input('sort') : 'Category.name';
        $sortDirection = request()->input('sort') ? (request()->input('desc') ? 'desc' : 'asc') : 'asc';
        $column = request()->input('sc');
        $query = Dish::query()
            ->leftjoin('Category', 'Dish.category_id', 'Category.id')
            ->select('Dish.image', 'Dish.id', 'Dish.name', 'Dish.price', 'Category.name as category_name', 'Dish.description')
            ->orderBy($sort, $sortDirection);
        if (Util::IsInvalidSearch($query->getQuery()->columns, $column)) {
            abort(403);
        }
        if (request()->input('sw')) {
            $search = request()->input('sw');
            $operator = Util::getOperator(request()->input('so'));
            if ($operator == 'like') {
                $search = '%'.$search.'%';
            }
            $query->where($column, $operator, $search);
        }
        $browseDishs = $query->paginate($size);
        return view('browseDishs.index', ['browseDishs' => $browseDishs]);
    }

    public function show($id)
    {
        $browseDish = Dish::query()
            ->leftJoin('Category', 'Dish.category_id', 'Category.id')
            ->select('Dish.id', 'Dish.name', 'Dish.price', 'Dish.category_id', 'Dish.image', 'Category.name as category_name', 'Dish.description')
            ->where('Dish.id', $id)
            ->first();
        return view('browseDishs.show', ['browseDish' => $browseDish, 'ref' => Util::getRef('/browseDishs')]);
    }

    public function addToCart(Request $request) {
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

        return redirect('/cartHeaders');
    }
}