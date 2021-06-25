<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caset extends Model
{
    protected $table = "caset";
    public $timestamps = true;
    protected $primaryKey = "caset_id";
    protected $guarded = [];

    public static function lzz_create_case($request){
        try {

            $data = self::create([
                'case_name' => $request['case_name'],
                'case_company'=>$request['case_company'],
                'contact_name'=>$request['contact_name'],
                'contact_number'=>$request['contact_number'],
                'contact_company'=>$request['contact_company'],
                'contact_email'=>$request['contact_email'],
                'contact_post'=>$request['contact_post'],
                'case_type'=>$request['case_type'],
                'case_code'=>$request['case_code'],
                'case_brief'=>$request['case_brief'],
                'case_file'=>$request['case_file'],
            ]);
            return $data;
        } catch(\Exception $e){
            logError('工作坊作品信息上传错误',[$e->getMessage()]);
        }
    }
}
