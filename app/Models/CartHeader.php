<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Util;

class CartHeader extends Model
{
    protected $table = 'CartHeader';
    protected $primaryKey = 'id';
    protected $fillable = [ 'user_id' ];
    public $incrementing = true;
    public $timestamps = false;
}