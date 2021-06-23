<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Caphy extends Model
{
    protected $table = "caphy";
    public $timestamps = true;
    protected $primaryKey = "caphy_id";
    protected $guarded = [];
}
