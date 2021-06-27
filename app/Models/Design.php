<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 14:35:23
 * @LastEditTime: 2021-06-27 08:48:23
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\app\Models\Design.php
 * Learn and live
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $table = "design";
    public $timestamps = true;
    protected $primaryKey = "design_id";
    protected $guarded = [];


    /**
     * @Author: Alexcutest
     * @description: 学生设计作品统计
     * @param {*} $opus_status
     * @return {*}
     */
    public static function stu_show($opus_status)
    {
        if ($opus_status == 0) {

            $res = Design::where('opus_status', '=', 0)
                ->join('sauthor', function ($join) {
                    $join->on('design_id', '=', 'sauthor.opus_id')
                        ->where('type_id', '=', 9);
                })
                ->select('design_id', 'opus_name', 'contact_name', 'design.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
                ->get();

            return $res ?
                $res :
                false;
        } elseif ($opus_status == 1) {

            $res = Design::where('opus_status', '=', 1)
                ->join('sauthor', function ($join) {
                    $join->on('design_id', '=', 'sauthor.opus_id')
                        ->where('type_id', '=', 9);
                })
                ->select('design_id', 'opus_name', 'contact_name', 'design.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
                ->get();

            return $res ?
                $res :
                false;
        }
    }

    /**
     * @Author: Alexcutest
     * @description: 学生设计表删除
     * @param {*} $opus_id
     * @return {*}
     */
    public static function stu_delete($opus_id)
    {
        try {
            $res = Design::where('design_id', '=', $opus_id)
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
            $res = Design::where('opus_name', '=', $opus_name)
                ->join('sauthor', function ($join) {
                    $join->on('design_id', '=', 'sauthor.opus_id')
                        ->where('type_id', '=', 9);
                })
                ->select('design_id', 'opus_name', 'contact_name', 'design.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
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
