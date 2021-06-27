<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 14:35:23
 * @LastEditTime: 2021-06-27 08:45:49
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\app\Models\Phophy.php
 * Learn and live
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phophy extends Model
{
    protected $table = "phophy";
    public $timestamps = true;
    protected $primaryKey = "phophy_id";
    protected $guarded = [];


    /**
     * @Author: Alexcutest
     * @description: 学生摄影作品统计
     * @param {*} $opus_status
     * @return {*}
     */
    public static function stu_show($opus_status)
    {
        if ($opus_status == 0) {

            $res = Phophy::where('opus_status', '=', 0)
                ->join('sauthor', function ($join) {
                    $join->on('phophy_id', '=', 'sauthor.opus_id')
                        ->where('type_id', '=', 8);
                })
                ->select('phophy_id', 'opus_name', 'contact_name', 'phophy.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
                ->get();

            return $res ?
                $res :
                false;
        } elseif ($opus_status == 1) {

            $res = Phophy::where('opus_status', '=', 1)
                ->join('sauthor', function ($join) {
                    $join->on('phophy_id', '=', 'sauthor.opus_id')
                        ->where('type_id', '=', 8);
                })
                ->select('phophy_id', 'opus_name', 'contact_name', 'phophy.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
                ->get();

            return $res ?
                $res :
                false;
        }
    }

    /**
     * @Author: Alexcutest
     * @description: 学生摄影表删除
     * @param {*} $opus_id
     * @return {*}
     */
    public static function stu_delete($opus_id)
    {
        try {
            $res = Phophy::where('phophy_id', '=', $opus_id)
                ->delete();

            return $res ?
                $res :
                false;
        } catch (\Exception $e) {
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
            $res = Phophy::where('opus_name', '=', $opus_name)
                ->join('sauthor', function ($join) {
                    $join->on('phophy_id', '=', 'sauthor.opus_id')
                        ->where('type_id', '=', 8);
                })
                ->select('phophy_id', 'opus_name', 'contact_name', 'phophy.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
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
