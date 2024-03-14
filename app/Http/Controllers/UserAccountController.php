<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Util;
use App\Models\UserAccount;

class UserAccountController extends Controller {

    public function index()
    {
        $size = request()->input('size') ? request()->input('size') : 10;
        $sort = request()->input('sort') ? request()->input('sort') : 'UserAccount.id';
        $sortDirection = request()->input('sort') ? (request()->input('desc') ? 'desc' : 'asc') : 'asc';
        $column = request()->input('sc');
        $query = UserAccount::query()
            ->select('UserAccount.id', 'UserAccount.name', 'UserAccount.email', 'UserAccount.active', 'UserAccount.address')
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
        $userAccounts = $query->paginate($size);
        return view('userAccounts.index', ['userAccounts' => $userAccounts]);
    }

    public function create()
    {
        return view('userAccounts.create', ['ref' => Util::getRef('/userAccounts')]);
    }

    public function store()
    {
        Util::setRef();
        $this->validate(request(), [
            'name' => 'unique:UserAccount,name|required|max:50',
            'email' => 'unique:UserAccount,email|required|max:50',
            'address' => 'required|max:50',
        ]);
        $token = Str::random(40);
        $password = Hash::make(Str::random(10));
        UserAccount::create([
            'password_reset_token' => $token,
            'password' => $password,
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'address' => request()->input('address'),
            'active' => Util::getRaw(request()->input('active') == null ? false : request()->input('active'))
        ]);
        Util::sentMail('WELCOME', $userAccount->email, $token, $userAccount->name);
        return redirect(request()->query->get('ref'));
    }

    public function show($id)
    {
        $userAccount = UserAccount::query()
            ->select('UserAccount.id', 'UserAccount.name', 'UserAccount.email', 'UserAccount.address', 'UserAccount.active')
            ->where('UserAccount.id', $id)
            ->first();
        return view('userAccounts.show', ['userAccount' => $userAccount, 'ref' => Util::getRef('/userAccounts')]);
    }

    public function edit($id)
    {
        $userAccount = UserAccount::query()
            ->select('UserAccount.id', 'UserAccount.name', 'UserAccount.email', 'UserAccount.active')
            ->where('UserAccount.id', $id)
            ->first();
        return view('userAccounts.edit', ['userAccount' => $userAccount, 'ref' => Util::getRef('/userAccounts')]);
    }

    public function update($id)
    {
        Util::setRef();
        $this->validate(request(), [
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'password' => 'max:100',
        ]);
        $userAccount = UserAccount::find($id);
        UserAccount::find($id)->update([
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'password' => request()->input('password') ? Hash::make(request()->input('password')) : $userAccount->password,
            'active' => Util::getRaw(request()->input('active') == null ? false : request()->input('active'))
        ]);
        return redirect(request()->query->get('ref'));
    }

    public function destroy($id)
    {
        UserAccount::find($id)->delete();
        return back();
    }
}