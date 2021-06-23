<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $table = "workshop";
    public $timestamps = true;
    protected $primaryKey = "workshop_id";
    protected $guarded = [];
}
