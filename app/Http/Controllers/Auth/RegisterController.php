<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserAccount;
use App\Models\UserRole;
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
            'name' => 'required|string|max:255|unique:useraccount',
            'email' => 'required|string|email|max:255|unique:useraccount',
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

        return redirect('/login');
    }
}