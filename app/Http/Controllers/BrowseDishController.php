<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Util;
use App\Models\Dish;

class BrowseDishController extends Controller {

    public function index()
    {
        $size = request()->input('size') ? request()->input('size') : 10;
        $sort = request()->input('sort') ? request()->input('sort') : 'Category.name';
        $sortDirection = request()->input('sort') ? (request()->input('desc') ? 'desc' : 'asc') : 'asc';
        $column = request()->input('sc');
        $query = Dish::query()
            ->leftjoin('Category', 'Dish.category_id', 'Category.id')
            ->select('Dish.image', 'Dish.name', 'Dish.price', 'Category.name as category_name', 'Dish.id')
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
        $browseDishs = $query->paginate($size);
        return view('browseDishs.index', ['browseDishs' => $browseDishs]);
    }

    public function show($id)
    {
        $browseDish = Dish::query()
            ->leftJoin('Category', 'Dish.category_id', 'Category.id')
            ->select('Dish.id', 'Dish.name', 'Dish.price', 'Dish.category_id', 'Dish.image', 'Category.name as category_name')
            ->where('Dish.id', $id)
            ->first();
        return view('browseDishs.show', ['browseDish' => $browseDish, 'ref' => Util::getRef('/browseDishs')]);
    }
}
