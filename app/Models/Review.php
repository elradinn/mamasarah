<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Util;

class Review extends Model
{
    protected $table = 'Review';
    protected $primaryKey = 'id';
    protected $fillable = [ 'id', 'user_id', 'review' ];
    public $incrementing = false;
    public $timestamps = false;
}