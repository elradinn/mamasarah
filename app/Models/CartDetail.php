<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Util;

class CartDetail extends Model
{
    protected $table = 'CartDetail';
    protected $primaryKey = 'id';
    protected $fillable = [ 'id', 'cart_id', 'dish_id', 'qty' ];
    public $incrementing = false;
    public $timestamps = false;
}