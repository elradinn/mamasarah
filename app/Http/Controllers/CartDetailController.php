<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Util;
use App\Models\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{

    public function create()
    {
        $dishs = DB::table('Dish')
            ->select('Dish.id', 'Dish.name')
            ->get();
        return view('cartDetails.create', ['ref' => Util::getRef('/cartDetails'), 'dishs' => $dishs]);
    }

    public function store()
    {
        Util::setRef();
        $this->validate(request(), [
            'dish_id' => 'required',
            'qty' => 'required'
        ]);
        CartDetail::create([
            'cart_id' => request()->input('cart_id'),
            'dish_id' => request()->input('dish_id'),
            'qty' => request()->input('qty')
        ]);
        return redirect(request()->query->get('ref'));
    }

    public function edit()
    {
        $cartDetail = CartDetail::query()
            ->select('CartDetail.cart_id', 'CartDetail.dish_id', 'CartDetail.qty')
            ->first();
        $dishs = DB::table('Dish')
            ->select('Dish.id', 'Dish.name')
            ->get();
        return view('cartDetails.edit', ['cartDetail' => $cartDetail, 'ref' => Util::getRef('/cartDetails'), 'dishs' => $dishs]);
    }

    public function updateQuantity(Request $request)
    {
        $cartDetail = CartDetail::find($request->input('cartDetail_id'));
        $cartDetail->qty = $request->input('qty');
        $cartDetail->save();

        return back();
    }

    public function destroy($id)
    {
        CartDetail::find($id)->delete();
        return back();
    }
}
