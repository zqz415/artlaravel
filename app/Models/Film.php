<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = "film";
    public $timestamps = true;
    protected $primaryKey = "film_id";
    protected $guarded = [];
}
