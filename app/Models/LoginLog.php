<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Util;

class LoginLog extends Model
{
    protected $table = 'LoginLog';
    protected $primaryKey = 'id';
    protected $fillable = [ 'user_id' ];
    public $incrementing = true;
    public $timestamps = false;

    public function getOrderDateAttribute($value)
    {
        return Util::formatDate($value);
    }
}
