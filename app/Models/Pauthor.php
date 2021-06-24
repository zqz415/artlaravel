<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pauthor extends Model
{
    protected $table = "pauthor";
    public $timestamps = true;
    protected $primaryKey = "pauthor_id";
    protected $guarded = [];

    /***
     * lzz
     * 校长绘画作品校长信息上传
     * @param $request
     * @param $id
     * @return mixed
     */
    public static function lzz_creat_pauthor($request,$id){
        try {

            $data = Pauthor::create([
                'type_id' => 11,
                'opus_id' => $id,
                'pauthor_name' => $request['pauthor_name'],
                'pauthor_card' => $request['pauthor_card'],
                'pauthor_area' => $request['pauthor_area'],
                'school_name' => $request['school_name'],
                'pauther_job' => $request['pauther_job'],
                'contact_number' => $request['contact_number']
            ]);
            return $data;
        } catch(\Exception $e){
            logError('校长信息信息错误',[$e->getMessage()]);
        }
    }
}
