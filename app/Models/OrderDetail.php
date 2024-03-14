<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Util;

class OrderDetail extends Model
{
    protected $table = 'OrderDetail';
    protected $primaryKey = 'id';
    protected $fillable = [ 'order_id', 'dish_id', 'qty', 'remarks' ];
    public $incrementing = true;
    public $timestamps = false;
}