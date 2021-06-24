<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dance extends Model
{
    protected $table = "dance";
    public $timestamps = true;
    protected $primaryKey = "dance_id";
    protected $guarded = [];
}
