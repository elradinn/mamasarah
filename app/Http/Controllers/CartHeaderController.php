<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Util;
use App\Models\CartHeader;
use App\Models\OrderHeader;
use App\Models\CartDetail;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CartHeaderController extends Controller {

    // public function index()
    // {
    //     $size = request()->input('size') ? request()->input('size') : 10;
    //     $sort = request()->input('sort') ? request()->input('sort') : 'CartHeader.id';
    //     $sortDirection = request()->input('sort') ? (request()->input('desc') ? 'desc' : 'asc') : 'asc';
    //     $column = request()->input('sc');
    //     $query = CartHeader::query()
    //         ->leftjoin('UserAccount', 'CartHeader.user_id', 'UserAccount.id')
    //         ->select('CartHeader.id', 'UserAccount.name as user_account_name')
    //         ->orderBy($sort, $sortDirection);
    //     if (Util::IsInvalidSearch($query->getQuery()->columns, $column)) {
    //         abort(403);
    //     }
    //     if (request()->input('sw')) {
    //         $search = request()->input('sw');
    //         $operator = Util::getOperator(request()->input('so'));
    //         if ($operator == 'like') {
    //             $search = '%'.$search.'%';
    //         }
    //         $query->where($column, $operator, $search);
    //     }
    //     $cartHeaders = $query->paginate($size);
    //     return view('cartHeaders.index', ['cartHeaders' => $cartHeaders]);
    // }

    public function index()
    {
        $id = Auth::id();

        $cartHeader = CartHeader::query()
            ->leftjoin('UserAccount', 'CartHeader.user_id', 'UserAccount.id')
            ->select('CartHeader.id', 'CartHeader.user_id', 'UserAccount.name as user_account_name')
            ->where('CartHeader.user_id', $id)
            ->first();
        $cartHeaderCartDetails = DB::table('CartHeader')
            ->join('CartDetail', 'CartHeader.id', 'CartDetail.cart_id')
            ->join('Dish', 'CartDetail.dish_id', 'Dish.id')
            ->select('Dish.image as dish_image', 'Dish.name as dish_name', 'CartDetail.qty', 'Dish.price as dish_price', 'CartDetail.id')
            ->where('CartHeader.user_id', $id)
            ->get();
        return view('cartHeaders.show', ['cartHeader' => $cartHeader, 'ref' => Util::getRef('/cartHeaders'), 'cartHeaderCartDetails' => $cartHeaderCartDetails]);
    }

    public function create()
    {
        $userAccounts = DB::table('UserAccount')
            ->select('UserAccount.id', 'UserAccount.name')
            ->get();
        return view('cartHeaders.create', ['ref' => Util::getRef('/cartHeaders'), 'userAccounts' => $userAccounts]);
    }

    public function store()
    {
        Util::setRef();
        $this->validate(request(), [
            'user_id' => 'required'
        ]);
        CartHeader::create([
            'user_id' => request()->input('user_id')
        ]);
        return redirect(request()->query->get('ref'));
    }

    public function edit($id)
    {
        $cartHeader = CartHeader::query()
            ->select('CartHeader.id', 'CartHeader.user_id')
            ->where('CartHeader.id', $id)
            ->first();
        $userAccounts = DB::table('UserAccount')
            ->select('UserAccount.id', 'UserAccount.name')
            ->get();
        return view('cartHeaders.edit', ['cartHeader' => $cartHeader, 'ref' => Util::getRef('/cartHeaders'), 'userAccounts' => $userAccounts]);
    }

    public function update($id)
    {
        Util::setRef();
        $this->validate(request(), [
            'user_id' => 'required'
        ]);
        CartHeader::find($id)->update([
            'user_id' => request()->input('user_id')
        ]);
        return redirect(request()->query->get('ref'));
    }

    public function destroy($id)
    {
        CartHeader::find($id)->delete();
        return back();
    }

    public function proceedToOrder(Request $request)
    {
        $userId = Auth::id();

        // Get cart header and details
        $cartHeader = CartHeader::where('user_id', $userId)->first();
        $cartDetails = CartDetail::where('cart_id', $cartHeader->id)->get();

        // Create order header
        $orderHeader = new OrderHeader();
        $orderHeader->user_id = $cartHeader->user_id;
        $orderHeader->status_id = 3; // Dispatch default
        $orderHeader->order_date = date('Y-m-d H:i:s');
        $orderHeader->save();

        // Create order details for each cart detail
        foreach ($cartDetails as $cartDetail) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $orderHeader->id;
            $orderDetail->dish_id = $cartDetail->dish_id;
            $orderDetail->qty = $cartDetail->qty;
            $orderDetail->save();
        }

        // Delete cart details to reset card header
        CartDetail::where('cart_id', $cartHeader->id)->delete();

        return redirect('/pay');
    }
}