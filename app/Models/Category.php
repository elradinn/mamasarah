<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Util;

class Category extends Model
{
    protected $table = 'Category';
    protected $primaryKey = 'id';
    protected $fillable = [ 'name' ];
    public $incrementing = true;
    public $timestamps = false;
}