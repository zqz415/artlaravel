<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $table = "design";
    public $timestamps = true;
    protected $primaryKey = "design_id";
    protected $guarded = [];
}
