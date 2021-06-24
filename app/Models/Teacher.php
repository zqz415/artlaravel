<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teacher";
    public $timestamps = true;
    protected $primaryKey = "teacher_id";
    protected $guarded = [];

    /***
     * lzz
     * 工作坊作品指导教师信息上传
     * @param $request
     * @param $id
     * @return mixed
     */
    public static function lzz_creat_teacher($request){
        try {

            $data = self::create([
                'type_id'=>$request['type_id'],
                'opus_id'=>$request['opus_id'],
                'teacher_name'=>$request['teacher_name'],
                'teacher_card'=>$request['teacher_card'],
                'teacher_nation'=>$request['teacher_nation'],
                'teacher_age'=>$request['teacher_age'],
                'teacher_area'=>$request['teacher_area'],
                'school_name'=>$request['school_name'],
                'school_depa'=>$request['school_depa'],
                'contact_number'=>$request['contact_number'],
                'teacher_post'=>$request['teacher_post'],
            ]);
            return $data;
        } catch(\Exception $e){
            logError('工作坊作品教师信息上传错误',[$e->getMessage()]);
        }
    }
}
