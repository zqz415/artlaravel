<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    protected $table = "painting";
    public $timestamps = true;
    protected $primaryKey = "painting_id";
    protected $guarded = [];
}
