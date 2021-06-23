<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Caset extends Model
{
    protected $table = "caset";
    public $timestamps = true;
    protected $primaryKey = "caset_id";
    protected $guarded = [];
}
