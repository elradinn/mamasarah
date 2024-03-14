<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Util;
use App\Models\OrderDetail;

class OrderDetailController extends Controller {

    public function create()
    {
        $dishs = DB::table('Dish')
            ->select('Dish.id', 'Dish.name')
            ->get();
        return view('orderDetails.create', ['ref' => Util::getRef('/orderDetails'), 'dishs' => $dishs]);
    }

    public function store()
    {
        Util::setRef();
        $this->validate(request(), [
            'qty' => 'required',
            'dish_id' => 'required',
            'remarks' => 'max:50'
        ]);
        OrderDetail::create([
            'order_id' => request()->input('order_id'),
            'qty' => request()->input('qty'),
            'dish_id' => request()->input('dish_id'),
            'remarks' => request()->input('remarks')
        ]);
        return redirect(request()->query->get('ref'));
    }

    public function edit()
    {
        $orderDetail = OrderDetail::query()
            ->select('OrderDetail.order_id', 'OrderDetail.dish_id', 'OrderDetail.qty', 'OrderDetail.remarks')
            ->first();
        $dishs = DB::table('Dish')
            ->select('Dish.name')
            ->get();
        return view('orderDetails.edit', ['orderDetail' => $orderDetail, 'ref' => Util::getRef('/orderDetails'), 'dishs' => $dishs]);
    }

    public function update()
    {
        Util::setRef();
        $this->validate(request(), [
            'dish_id' => 'required',
            'qty' => 'required',
            'remarks' => 'max:50'
        ]);
        OrderDetail::find()->update([
            'order_id' => request()->input('order_id'),
            'dish_id' => request()->input('dish_id'),
            'qty' => request()->input('qty'),
            'remarks' => request()->input('remarks')
        ]);
        return redirect(request()->query->get('ref'));
    }

    public function destroy($id)
    {
        OrderDetail::find($id)->delete();
        return back();
    }
}