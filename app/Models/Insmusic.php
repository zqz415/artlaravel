<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Insmusic extends Model
{
    protected $table = "insmusic";
    public $timestamps = true;
    protected $primaryKey = "insmusic_id";
    protected $guarded = [];
}
