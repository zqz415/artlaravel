<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Prpainting extends Model
{
    protected $table = "prpainting";
    public $timestamps = true;
    protected $primaryKey = "prpainting_id";
    protected $guarded = [];
}
