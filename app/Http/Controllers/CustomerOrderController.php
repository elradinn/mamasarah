<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderHeader;
use App\Util;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $size = request()->input('size') ? request()->input('size') : 10;
        $sort = request()->input('sort') ? request()->input('sort') : 'OrderHeader.id';
        $sortDirection = request()->input('sort') ? (request()->input('desc') ? 'desc' : 'asc') : 'asc';
        $column = request()->input('sc');
        $query = OrderHeader::query()
            ->leftjoin('UserAccount', 'OrderHeader.user_id', 'UserAccount.id')
            ->leftjoin('Status', 'OrderHeader.status_id', 'Status.id')
            ->select('OrderHeader.user_id','OrderHeader.id', 'OrderHeader.order_date', 'UserAccount.name as user_account_name', 'UserAccount.address as user_account_address', 'Status.name as status_name')
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
        $orderHeaders = $query->paginate($size);
        return view('customerOrders.index', ['orderHeaders' => $orderHeaders]);
    }

    public function destroy($id)
    {
        OrderHeader::find($id)->delete();
        return back();
    }
}
