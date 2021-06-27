<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 14:35:23
 * @LastEditTime: 2021-06-27 08:45:32
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\app\Models\Caphy.php
 * Learn and live
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caphy extends Model
{
    protected $table = "caphy";
    public $timestamps = true;
    protected $primaryKey = "caphy_id";
    protected $guarded = [];

    /**
     * @Author: Alexcutest
     * @description: 学生书法作品统计
     * @param {*} $opus_status
     * @return {*}
     */
    public static function stu_show($opus_status)
    {
        try {

            if ($opus_status == 0) {

                $res = Caphy::where('opus_status', '=', 0)
                    ->join('sauthor', function ($join) {

                        $join->on('caphy_id', '=', 'sauthor.opus_id')
                            ->where('type_id', '=', 7);
                    })
                    ->select('caphy_id', 'opus_name', 'contact_name', 'caphy.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
                    ->get();
                return $res ?
                    $res :
                    false;
            } elseif ($opus_status == 1) {

                $res = Caphy::where('opus_status', '=', 1)
                    ->join('sauthor', function ($join) {

                        $join->on('caphy_id', '=', 'sauthor.opus_id')
                            ->where('type_id', '=', 7);
                    })
                    ->select('caphy_id', 'opus_name', 'contact_name', 'caphy.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
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
     * @description: 学生书法表删除
     * @param {*} $opus_id
     * @return {*}
     */
    public static function stu_delete($opus_id)
    {
        try {
            $res = Caphy::where('caphy_id', '=', $opus_id)
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
            $res = Caphy::where('opus_name', '=', $opus_name)
                ->join('sauthor', function ($join) {

                    $join->on('caphy_id', '=', 'sauthor.opus_id')
                        ->where('type_id', '=', 7);
                })
                ->select('caphy_id', 'opus_name', 'contact_name', 'caphy.contact_number', 'contact_address', 'sauthor.sauthor_name', 'opus_status')
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
