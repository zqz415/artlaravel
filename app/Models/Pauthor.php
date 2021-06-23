<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Pauthor extends Model
{
    protected $table = "pauthor";
    public $timestamps = true;
    protected $primaryKey = "pauthor_id";
    protected $guarded = [];
}
