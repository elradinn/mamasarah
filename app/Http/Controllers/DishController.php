<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Util;
use App\Models\Dish;

class DishController extends Controller {

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
        return view('dishs.index', ['dishs' => $dishs]);
    }

    public function create()
    {
        $categories = DB::table('Category')
            ->select('Category.id', 'Category.name')
            ->get();
        return view('dishs.create', ['ref' => Util::getRef('/dishs'), 'categories' => $categories]);
    }

    public function store()
    {
        Util::setRef();
        $this->validate(request(), [
            'name' => 'unique:Dish,name|required|max:50',
            'price' => 'required|max:12,2',
            'category_id' => 'required',
            'image' => 'required|max:5000'
        ]);
        $image = Util::getFile('dishs', request()->file('image'));
        Dish::create([
            'name' => request()->input('name'),
            'price' => request()->input('price'),
            'category_id' => request()->input('category_id'),
            'image' => $image
        ]);
        return redirect(request()->query->get('ref'));
    }

    public function show($id)
    {
        $dish = Dish::query()
            ->leftjoin('Category', 'Dish.category_id', 'Category.id')
            ->select('Dish.image', 'Dish.id', 'Dish.name', 'Dish.price', 'Category.name as category_name', 'Dish.description')
            ->where('Dish.id', $id)
            ->first();
        return view('dishs.show', ['dish' => $dish, 'ref' => Util::getRef('/dishs')]);
    }

    public function edit($id)
    {
        $dish = Dish::query()
            ->select('Dish.id', 'Dish.name', 'Dish.price', 'Dish.category_id', 'Dish.image')
            ->where('Dish.id', $id)
            ->first();
        $categories = DB::table('Category')
            ->select('Category.id', 'Category.name')
            ->get();
        return view('dishs.edit', ['dish' => $dish, 'ref' => Util::getRef('/dishs'), 'categories' => $categories]);
    }

    public function update($id)
    {
        Util::setRef();
        $this->validate(request(), [
            'name' => 'required|max:50',
            'price' => 'required|max:12,2',
            'category_id' => 'required',
            'image' => 'max:50'
        ]);
        $dish = Dish::find($id);
        $image = Util::getFile('dishs', request()->file('image')) ?? $dish->image;
        Dish::find($id)->update([
            'name' => request()->input('name'),
            'price' => request()->input('price'),
            'category_id' => request()->input('category_id'),
            'image' => $image
        ]);
        return redirect(request()->query->get('ref'));
    }

    public function destroy($id)
    {
        Dish::find($id)->delete();
        return back();
    }
}