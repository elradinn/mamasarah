<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Util;

class OrderHeader extends Model
{
    protected $table = 'OrderHeader';
    protected $primaryKey = 'id';
    protected $fillable = [ 'order_date', 'status_id', 'user_id' ];
    public $incrementing = true;
    public $timestamps = false;

    public function getOrderDateAttribute($value)
    {
        return Util::formatDate($value);
    }
}