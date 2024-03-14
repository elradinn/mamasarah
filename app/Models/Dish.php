<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Util;

class Dish extends Model
{
    protected $table = 'Dish';
    protected $primaryKey = 'id';
    protected $fillable = [ 'name', 'price', 'category_id', 'image', 'description' ];
    public $incrementing = true;
    public $timestamps = false;
}