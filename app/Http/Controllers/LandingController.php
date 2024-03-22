<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class LandingController extends Controller
{
    public function index()
    {
        $browseDishs = Dish::query()
            ->leftJoin('Category', 'Dish.category_id', '=', 'Category.id')
            ->select('Dish.image', 'Dish.id', 'Dish.name', 'Dish.price', 'Category.name as category_name', 'Dish.description')
            ->get();
        return view('landing', ['browseDishs' => $browseDishs]);
    }
}
