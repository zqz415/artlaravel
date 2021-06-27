<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 14:35:23
 * @LastEditTime: 2021-06-27 08:46:34
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\app\Models\Film.php
 * Learn and live
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = "film";
    public $timestamps = true;
    protected $primaryKey = "film_id";
    protected $guarded = [];

    /**
     * @Author: Alexcutest
     * @description: 学生微电影作品统计 
     * @param {*} $opus_status
     * @return {*}
     */
    public static function stu_show($opus_status)
    {
        if ($opus_status == 0) {

            $res = Film::where('opus_status', '=', 0)
                ->join('sauthor', function ($join) {
                    $join->on('film_id', '=', 'sauthor.opus_id')
                        ->where('type_id', '=', 10);
                })
                ->select('film_id', 'opus_name', 'contact_name', 'film.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
                ->get();

            return $res ?
                $res :
                false;
        } elseif ($opus_status == 1) {

            $res = Film::where('opus_status', '=', 1)
                ->join('sauthor', function ($join) {
                    $join->on('film_id', '=', 'sauthor.opus_id')
                        ->where('type_id', '=', 10);
                })
                ->select('film_id', 'opus_name', 'contact_name', 'film.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
                ->get();

            return $res ?
                $res :
                false;
        }
    }

    /**
     * @Author: Alexcutest
     * @description: 学生微电影表删除
     * @param {*} $opus_id
     * @return {*}
     */
    public static function stu_delete($opus_id)
    {
        try {
            $res = Film::where('film_id', '=', $opus_id)
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
            $res = Film::where('opus_name', '=', $opus_name)
                ->join('sauthor', function ($join) {
                    $join->on('film_id', '=', 'sauthor.opus_id')
                        ->where('type_id', '=', 10);
                })
                ->select('film_id', 'opus_name', 'contact_name', 'film.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')

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
