<?php

namespace App\Http\Controllers\Auth;

use App\Util;
use App\Models\UserAccount;
use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['user', 'logout']]);
    }

    protected function username()
    {
        return 'name';
    }

    protected function credentials()
    {
        return [$this->username() => request()->name, 'password' => request()->password, 'active' => 1];
    }

    protected function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    protected function resetPassword()
    {
        return view('auth.resetPassword');
    }

    protected function resetPasswordPost()
    {
        $email = request()->input('email');
        $user = UserAccount::query()
            ->select('UserAccount.id', 'UserAccount.name')
            ->where('UserAccount.email', $email)
            ->first();
        if ($user) {
            $token = Str::random(40);
            $user->update(['password_reset_token' => $token]);
            Util::sentMail('RESET', $email, $token, $user->name);
            return view('auth.resetPassword', ['success' => true]);
        } else {
            return view('auth.resetPassword', ['error' => true]);
        }
    }

    protected function changePassword($token)
    {
        $user = UserAccount::query()
            ->select('UserAccount.id')
            ->where('UserAccount.password_reset_token', $token)
            ->first();
        if ($user) {
            return view('auth.changePassword', ['token' => $token]);
        } else {
            abort(404);
        }
    }

    protected function changePasswordPost($token)
    {
        $user = UserAccount::query()
            ->select('UserAccount.id')
            ->where('UserAccount.password_reset_token', $token)
            ->first();
        if ($user) {
            $user->update([
                'password' => Hash::make(request()->input('password')),
                'password_reset_token' => null,
            ]);
            session()->flash('success', 'Password reset successful! Please log in.');
            // return view('auth.changePassword', ['success' => true, 'token' => $token]);
            return redirect('/login');
        } else {
            return view('auth.changePassword', ['error' => true, 'token' => $token]);
        }
    }

    protected function authenticated(Request $request, $user)
    {
        LoginLog::create([
            'user_id' => $user->id
        ]);

        if ($user->hasRole('ADMIN')) {
            return redirect('/home');
        } else if ($user->hasRole('USER')) {
            return redirect('/browse-menu');
        }
    }
}
