<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "student";
    public $timestamps = true;
    protected $primaryKey = "student_id";
    protected $guarded = [];
}
