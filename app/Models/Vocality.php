<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 14:35:23
 * @LastEditTime: 2021-06-27 08:31:04
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\app\Models\Vocality.php
 * Learn and live
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vocality extends Model
{
    protected $table = "vocality";
    public $timestamps = true;
    protected $primaryKey = "vocality_id";
    protected $guarded = [];

    /**
     * @Author: Alexcutest
     * @description: 声乐作品统计
     * @param {*} $opus_status
     * @return {*}
     */    
    public static function per_show($opus_status)
    {

        try {
            if ($opus_status == 0) {

                $res = Vocality::where('opus_status', '=', 0)
                    ->select('vocality_id', 'opus_name1', 'contact_name', 'contact_number', 'contact_address', 'vocality_type', 'performer_number', 'opus_status')
                    ->get();

                return $res ?
                    $res :
                    false;
            } elseif ($opus_status == 1) {

                $res = Vocality::where('opus_status', '=', 1)
                    ->select('vocality_id', 'opus_name1', 'contact_name', 'contact_number', 'contact_address', 'vocality_type', 'performer_number', 'opus_status')
                    ->get();


                return $res ?
                    $res :
                    false;
            }
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }
    
    /**
     * @Author: Alexcutest
     * @description: 声乐表删除
     * @param {*} $opus_id
     * @return {*}
     */    
    public static function per_delete($opus_id){
        try{
            $res = Vocality::where('vocality_id','=',$opus_id)
            ->delete();

            return $res ?
                    $res :
                    false;

        }catch(\Exception $e){
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }



    
    
    /**
     * @Author: Alexcutest
     * @description: 搜索
     * @param {*} $opus_name
     * @return {*}
     */    
    public static function search_show($opus_name){
        try{
             $res = Vocality::where('vocality.opus_name1','=',$opus_name)
            ->select('vocality_id', 'opus_name1', 'contact_name', 'contact_number', 'contact_address', 'vocality_type', 'performer_number', 'opus_status')
            ->get();

            return $res ?
                    $res :
                    false;

        }catch(\Exception $e){
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }
    

}
