<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Util;
use App\Models\Category;

class CategoryController extends Controller {

    public function index()
    {
        $size = request()->input('size') ? request()->input('size') : 10;
        $sort = request()->input('sort') ? request()->input('sort') : 'Category.id';
        $sortDirection = request()->input('sort') ? (request()->input('desc') ? 'desc' : 'asc') : 'asc';
        $column = request()->input('sc');
        $query = Category::query()
            ->select('Category.id', 'Category.name')
            ->orderBy($sort, $sortDirection);
        if (request()->input('sw')) {
            $search = request()->input('sw');
            $query->where(function ($query) use ($search) {
                $query->where('Category.id', 'like', '%' . $search . '%')
                      ->orWhere('Category.name', 'like', '%' . $search . '%');
            });
        }
        $categories = $query->paginate($size);
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create', ['ref' => Util::getRef('/categories')]);
    }

    public function store()
    {
        Util::setRef();
        $this->validate(request(), [
            'name' => 'unique:Category,name|required|max:50'
        ]);
        Category::create([
            'name' => request()->input('name')
        ]);
        return redirect(request()->query->get('ref'));
    }

    public function show($id)
    {
        $category = Category::query()
            ->select('Category.id', 'Category.name')
            ->where('Category.id', $id)
            ->first();
        return view('categories.show', ['category' => $category, 'ref' => Util::getRef('/categories')]);
    }

    public function edit($id)
    {
        $category = Category::query()
            ->select('Category.id', 'Category.name')
            ->where('Category.id', $id)
            ->first();
        return view('categories.edit', ['category' => $category, 'ref' => Util::getRef('/categories')]);
    }

    public function update($id)
    {
        Util::setRef();
        $this->validate(request(), [
            'name' => 'required|max:50'
        ]);
        Category::find($id)->update([
            'name' => request()->input('name')
        ]);
        return redirect(request()->query->get('ref'));
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return back();
    }
}
