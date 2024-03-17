<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\OrderHeader;
use App\Models\OrderDetail;
use App\Models\UserAccount;

class SystemController extends Controller {

    public function home()
    {
        $totalEarnings = 0;
        $orderDetails = OrderDetail::all();

        foreach ($orderDetails as $orderDetail) {
            $dish = Dish::find($orderDetail->dish_id);
            $totalEarnings += $dish->price * $orderDetail->qty;
        }

        $data = [
            'usersCount' => UserAccount::count(),
            'dishesCount' => Dish::count(),
            'ordersCount' => OrderHeader::count(),
            'totalEarnings' => $totalEarnings,
            'deliveredCount' => OrderHeader::where('status_id', 1)->count(),
            'cancelledCount' => OrderHeader::where('status_id', 2)->count(),
            'dispatchedCount' => OrderHeader::where('status_id', 3)->count(),
            'processingCount' => OrderHeader::where('status_id', 4)->count(),
        ];

        return view('home', $data);
    }

    public function profile()
    {
        $id = Auth::id();
        $userAccount = UserAccount::query()
            ->select('UserAccount.name', 'UserAccount.email', 'UserAccount.password', 'UserAccount.address')
            ->where('UserAccount.id', $id)
            ->first();
        if  ($id === 1) {
        return view('profile', [ 'userAccount' => $userAccount ]);
        } else {
            return view('customerProfile.index', ['userAccount' => $userAccount]);
        }
    }

    public function updateProfile()
    {
        $this->validate(request(), [
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'password' => 'max:100',
            'address' => 'required|max:50'
        ]);
        $id = Auth::id();
        $userAccount = UserAccount::find($id);
        UserAccount::find($id)->update([
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'password' => request()->input('password') ? Hash::make(request()->input('password')) : $userAccount->password,
            'address' => request()->input('address'),
        ]);
        return redirect('/home');
    }

    public function stack() {
        return 'Laravel 10 + MySQL';
    }
}