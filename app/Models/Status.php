<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Util;

class Status extends Model
{
    protected $table = 'Status';
    protected $primaryKey = 'id';
    protected $fillable = [ 'name' ];
    public $incrementing = true;
    public $timestamps = false;
}