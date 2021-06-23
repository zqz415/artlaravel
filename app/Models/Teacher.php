<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teacher";
    public $timestamps = true;
    protected $primaryKey = "teacher_id";
    protected $guarded = [];
}
