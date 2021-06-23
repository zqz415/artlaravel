<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Opera extends Model
{
    protected $table = "opera";
    public $timestamps = true;
    protected $primaryKey = "opera_id";
    protected $guarded = [];
}
