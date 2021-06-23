<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Prcaphy extends Model
{
    protected $table = "prcaphy";
    public $timestamps = true;
    protected $primaryKey = "prcaphy_id";
    protected $guarded = [];
}
