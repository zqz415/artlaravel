<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phophy extends Model
{
    protected $table = "phophy";
    public $timestamps = true;
    protected $primaryKey = "phophy_id";
    protected $guarded = [];

}
