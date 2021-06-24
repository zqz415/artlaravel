<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prpainting extends Model
{
    protected $table = "prpainting";
    public $timestamps = true;
    protected $primaryKey = "prpainting_id";
    protected $guarded = [];

    /**
     * lzz
     * 校长绘画作品上传
     * @param $request
     * @return mixed
     */
    public static function lzz_creat_prpa($request)
    {
        try {
            $data = self::create([
                'prpainting_type' =>  $request['prpainting_type'],
                'opus_name' => $request['opus_name'],
                'contact_name'=>$request['contact_name'],
                'contact_number'=>$request['contact_number'],
                'contact_address'=>$request['contact_address'],
                'create_time' => $request['create_time'],
                'opus_long' =>$request['opus_long'],
                'opus_wide' =>$request['opus_wide'],
                'opus_file' =>$request['opus_file'],
                'author_brief'=>$request['author_brief'],
                'opus_brief'=>$request['opus_brief']
            ]);
         return $data;
        } catch(\Exception $e){
            logError('校长绘画作品信息上传错误',[$e->getMessage()]);
        }
    }

    /***
     * lzz
     * 校长绘画作品id查询
     * @param $request
     * @return mixed
     */
    public static function lzz_select_prpa($request){
        try {
            $data = self::select('prpainting_id')
            ->where('opus_name',$request['opus_name'])
            ->where('contact_number',$request['contact_number'])
            ->get();
            return $data;
        } catch(\Exception $e){
            logError('校长绘画作品id查询错误',[$e->getMessage()]);
        }

    }
}
