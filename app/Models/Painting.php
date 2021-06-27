<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 14:35:23
 * @LastEditTime: 2021-06-27 08:44:51
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\app\Models\Painting.php
 * Learn and live
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    protected $table = "painting";
    public $timestamps = true;
    protected $primaryKey = "painting_id";
    protected $guarded = [];

    /**
     * @Author: Alexcutest
     * @description: 学生绘画作品统计
     * @param {*} $opus_status
     * @return {*}
     */
    public static function stu_show($opus_status)
    {
        try {
            if ($opus_status == 0) {

                $res = Painting::where('opus_status', '=', 0)
                    ->join('sauthor', function ($join) {
                        $join->on('painting_id', '=', 'sauthor.opus_id')
                            ->where('type_id', '=', 6);
                    })
                    ->select('painting_id', 'opus_name', 'contact_name', 'painting.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
                    ->get();

                return $res ?
                    $res :
                    false;
            } elseif ($opus_status == 1) {
                $res = Painting::where('opus_status', '=', 1)
                    ->join('sauthor', function ($join) {
                        $join->on('painting_id', '=', 'sauthor.opus_id')
                            ->where('type_id', '=', 6);
                    })
                    ->select('painting_id', 'opus_name', 'contact_name', 'painting.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
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
     * @description: 学生绘画表删除
     * @param {*} $opus_id
     * @return {*}
     */
    public static function stu_delete($opus_id)
    {
        try {
            $res = Painting::where('painting_id', '=', $opus_id)
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
            $res = Painting::where('opus_name', '=', $opus_name)
                ->join('sauthor', function ($join) {
                    $join->on('painting_id', '=', 'sauthor.opus_id')
                        ->where('type_id', '=', 6);
                })
                ->select('painting_id', 'opus_name', 'contact_name', 'painting.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
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
