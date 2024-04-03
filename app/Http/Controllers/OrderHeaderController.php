<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Util;
use App\Models\OrderHeader;

class OrderHeaderController extends Controller {

    public function index()
    {
        $size = request()->input('size') ? request()->input('size') : 10;
        $sort = request()->input('sort') ? request()->input('sort') : 'OrderHeader.id';
        $sortDirection = request()->input('sort') ? (request()->input('desc') ? 'desc' : 'asc') : 'asc';
        $column = request()->input('sc');
        $query = OrderHeader::query()
            ->leftjoin('UserAccount', 'OrderHeader.user_id', 'UserAccount.id')
            ->leftjoin('Status', 'OrderHeader.status_id', 'Status.id')
            ->select('OrderHeader.id', 'OrderHeader.order_date', 'UserAccount.name as user_account_name', 'UserAccount.address as user_account_address', 'Status.name as status_name')
            ->orderBy($sort, $sortDirection);
        if (request()->input('sw')) {
            $search = request()->input('sw');
            $query->where(function ($query) use ($search) {
                $query->where('OrderHeader.order_date', 'like', '%' . $search . '%')
                      ->orWhere('UserAccount.name', 'like', '%' . $search . '%')
                      ->orWhere('UserAccount.address', 'like', '%' . $search . '%')
                      ->orWhere('Status.name', 'like', '%' . $search . '%');
            });
        }
        $orderHeaders = $query->paginate($size);
        return view('orderHeaders.index', ['orderHeaders' => $orderHeaders]);
    }

    public function create()
    {
        $userAccounts = DB::table('UserAccount')
            ->select('UserAccount.id', 'UserAccount.name')
            ->get();
        return view('orderHeaders.create', ['ref' => Util::getRef('/orderHeaders'), 'userAccounts' => $userAccounts]);
    }

    public function store()
    {
        Util::setRef();
        $this->validate(request(), [
            'order_date' => 'required',
            'user_id' => 'required'
        ]);
        OrderHeader::create([
            'order_date' => Util::getDate(request()->input('order_date')),
            'user_id' => request()->input('user_id')
        ]);
        return redirect(request()->query->get('ref'));
    }

    public function show($id)
    {
        $orderHeader = OrderHeader::query()
            ->leftjoin('UserAccount', 'OrderHeader.user_id', 'UserAccount.id')
            ->select('OrderHeader.id', 'OrderHeader.order_date', 'UserAccount.name as user_account_name', 'UserAccount.address as user_account_address')
            ->where('OrderHeader.id', $id)
            ->first();
        $orderHeaderOrderDetails = DB::table('OrderHeader')
            ->join('OrderDetail', 'OrderHeader.id', 'OrderDetail.order_id')
            ->join('Dish', 'OrderDetail.dish_id', 'Dish.id')
            ->select('Dish.image as dish_image', 'Dish.name as dish_name', 'OrderDetail.qty', 'Dish.price as dish_price', 'OrderDetail.remarks', 'OrderDetail.id')
            ->where('OrderHeader.id', $id)
            ->get();
        return view('orderHeaders.show', ['orderHeader' => $orderHeader, 'ref' => Util::getRef('/orderHeaders'), 'orderHeaderOrderDetails' => $orderHeaderOrderDetails]);
    }

    public function edit($id)
    {
        $orderHeader = OrderHeader::query()
            ->select('OrderHeader.id', 'OrderHeader.order_date', 'OrderHeader.status_id', 'OrderHeader.user_id')
            ->where('OrderHeader.id', $id)
            ->first();
        $statuses = DB::table('Status')
            ->select('Status.id', 'Status.name')
            ->get();
        $userAccounts = DB::table('UserAccount')
            ->select('UserAccount.id', 'UserAccount.name')
            ->get();
        return view('orderHeaders.edit', ['orderHeader' => $orderHeader, 'ref' => Util::getRef('/orderHeaders'), 'statuses' => $statuses, 'userAccounts' => $userAccounts]);
    }

    public function update($id)
    {
        Util::setRef();
        $this->validate(request(), [
            'order_date' => 'required',
            'status_id' => 'required',
            'user_id' => 'required'
        ]);
        OrderHeader::find($id)->update([
            'order_date' => Util::getDate(request()->input('order_date')),
            'status_id' => request()->input('status_id'),
            'user_id' => request()->input('user_id')
        ]);
        return redirect(request()->query->get('ref'));
    }

    public function destroy($id)
    {
        OrderHeader::find($id)->delete();
        return back();
    }
}
