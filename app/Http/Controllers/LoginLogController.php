<?php

namespace App\Http\Controllers;

use App\Models\LoginLog;
use App\Models\OrderHeader;
use App\Util;
use Illuminate\Http\Request;

class LoginLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $size = request()->input('size') ? request()->input('size') : 10;
        $sort = request()->input('sort') ? request()->input('sort') : 'LoginLog.id';
        $sortDirection = request()->input('sort') ? (request()->input('desc') ? 'desc' : 'asc') : 'asc';
        $column = request()->input('sc');
        $query = LoginLog::query()
            ->leftjoin('UserAccount', 'LoginLog.user_id', 'UserAccount.id')
            ->select('LoginLog.id', 'UserAccount.name as user_account_name', 'LoginLog.login_time as user_login_time')
            ->orderBy($sort, $sortDirection);
        if (Util::IsInvalidSearch($query->getQuery()->columns, $column)) {
            abort(403);
        }
        if (request()->input('sw')) {
            $search = request()->input('sw');
            $operator = Util::getOperator(request()->input('so'));
            if ($column == 'OrderHeader.order_date') {
                $search = Util::formatDateStr($search, 'date');
            }
            if ($operator == 'like') {
                $search = '%'.$search.'%';
            }
            $query->where($column, $operator, $search);
        }
        $loginLogs = $query->paginate($size);
        return view('loginLogs.index', ['loginLogs' => $loginLogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LoginLog $loginLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoginLog $loginLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoginLog $loginLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoginLog $loginLog)
    {
        //
    }
}
