<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserAccount;
use App\Models\UserRole;
use App\Models\CartHeader;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:UserAccount',
            'email' => 'required|string|email|max:255|unique:UserAccount',
            'password' => 'required|string|min:4',
            'address' => 'required|string|max:255',
        ]);

        $user = UserAccount::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'active' => 1,
        ]);

        UserRole::create([
            'user_id' => $user->id,
            'role_id' => 2
        ]);

        CartHeader::create([
            'id' => $user->id,
            'user_id' => $user->id
        ]);

        return redirect('/login');
    }
}
