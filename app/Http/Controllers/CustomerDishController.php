<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Util;
use App\Models\Dish;

class CustomerDishController extends Controller {

    public function index()
    {
        $size = request()->input('size') ? request()->input('size') : 10;
        $sort = request()->input('sort') ? request()->input('sort') : 'Dish.id';
        $sortDirection = request()->input('sort') ? (request()->input('desc') ? 'desc' : 'asc') : 'asc';
        $column = request()->input('sc');
        $query = Dish::query()
            ->leftjoin('Category', 'Dish.category_id', 'Category.id')
            ->select('Dish.id', 'Dish.image', 'Dish.name', 'Dish.price', 'Category.name as category_name')
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
        $dishs = $query->paginate($size);
        return view('customerDishes.index', ['dishs' => $dishs]);
    }

    public function show($id)
    {
        $dish = Dish::query()
            ->select('Dish.id', 'Dish.name', 'Dish.price', 'Dish.category_id', 'Dish.image')
            ->where('Dish.id', $id)
            ->first();
        return view('customerDishes.show', ['dish' => $dish, 'ref' => Util::getRef('/dishs')]);
    }
}
