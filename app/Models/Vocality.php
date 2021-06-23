<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Vocality extends Model
{
    protected $table = "vocality";
    public $timestamps = true;
    protected $primaryKey = "vocality_id";
    protected $guarded = [];
}
