<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sauthor extends Model
{
    protected $table = "sauthor";
    public $timestamps = true;
    protected $primaryKey = "sauthor_id";
    protected $guarded = [];
}
