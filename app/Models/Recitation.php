<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 14:35:23
 * @LastEditTime: 2021-06-27 08:34:31
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\app\Models\Recitation.php
 * Learn and live
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recitation extends Model
{
    protected $table = "recitation";
    public $timestamps = true;
    protected $primaryKey = "recitation_id";
    protected $guarded = [];

    /**
     * @Author: Alexcutest
     * @description: 朗诵作品统计
     * @param {*} $opus_status
     * @return {*}
     */    
    public static function per_show($opus_status)
    {

        try {
            if ($opus_status == 0) {

                $res = Recitation::where('opus_status', '=', 0)
                    ->select('recitation_id', 'opus_name', 'contact_name', 'contact_number', 'contact_address', 'recitation_type', 'performer_number', 'opus_status')
                    ->get();

                return $res ?
                    $res :
                    false;
            } elseif ($opus_status == 1) {

                $res = Recitation::where('opus_status', '=', 1)
                    ->select('recitation_id', 'opus_name', 'contact_name', 'contact_number', 'contact_address', 'recitation_type', 'performer_number', 'opus_status')
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
     * @description: 朗诵表删除
     * @param {*} $opus_id
     * @return {*}
     */    
    public static function per_delete($opus_id){
        try{
            $res = Recitation::where('recitation_id','=',$opus_id)
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
    public static function search_show($opus_name)
    {
        try {
            $res = Recitation::where('opus_name', '=', $opus_name)
            ->select('recitation_id', 'opus_name', 'contact_name', 'contact_number', 'contact_address', 'recitation_type', 'performer_number', 'opus_status')    
            ->get();

            return $res ?
                $res :
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }
    
}
