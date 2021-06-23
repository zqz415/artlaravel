<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Recitation extends Model
{
    protected $table = "recitation";
    public $timestamps = true;
    protected $primaryKey = "recitation_id";
    protected $guarded = [];
}
