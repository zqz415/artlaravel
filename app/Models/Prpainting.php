<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 14:35:23
 * @LastEditTime: 2021-06-27 08:49:08
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\app\Models\Prpainting.php
 * Learn and live
 */

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
                'contact_name' => $request['contact_name'],
                'contact_number' => $request['contact_number'],
                'contact_address' => $request['contact_address'],
                'create_time' => $request['create_time'],
                'opus_long' => $request['opus_long'],
                'opus_wide' => $request['opus_wide'],
                'opus_file' => $request['opus_file'],
                'author_brief' => $request['author_brief'],
                'opus_brief' => $request['opus_brief']
            ]);
            return $data;
        } catch (\Exception $e) {
            logError('校长绘画作品信息上传错误', [$e->getMessage()]);
        }
    }

    /***
     * lzz
     * 校长绘画作品id查询
     * @param $request
     * @return mixed
     */
    public static function lzz_select_prpa($request)
    {
        try {
            $data = self::select('prpainting_id')
                ->where('opus_name', $request['opus_name'])
                ->where('contact_number', $request['contact_number'])
                ->get();
            return $data;
        } catch (\Exception $e) {
            logError('校长绘画作品id查询错误', [$e->getMessage()]);
        }
    }






    /**
     * @Author: Alexcutest
     * @description: 校长绘画作品统计
     * @param {*} $opus_status
     * @return {*}
     */
    public static function hed_show($opus_status)
    {
        try {
            if ($opus_status == 0) {

                $res = Prpainting::where('opus_status', '=', 0)
                    ->join('pauthor', function ($join) {
                        $join->on('prpainting_id', '=', 'pauthor.opus_id')
                            ->where('type_id', '=', 11);
                    })
                    ->select('prpainting_id', 'opus_name', 'contact_name', 'prpainting.contact_number', 'contact_address', 'pauthor.pauthor_name', 'opus_status')
                    ->get();

                return $res ?
                    $res :
                    false;
            } elseif ($opus_status == 1) {

                $res = Prpainting::where('opus_status', '=', 1)
                    ->join('pauthor', function ($join) {
                        $join->on('prpainting_id', '=', 'pauthor.opus_id')
                            ->where('type_id', '=', 11);
                    })
                    ->select('prpainting_id', 'opus_name', 'contact_name', 'prpainting.contact_number', 'contact_address', 'pauthor.pauthor_name', 'opus_status')
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
     * @description: 校长绘画删除
     * @param {*} $opus_id
     * @return {*}
     */
    public static function hed_delete($opus_id)
    {
        try {

            $res = Prpainting::where('prpainting_id', '=', $opus_id)
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
            $res = Prpainting::where('opus_name', '=', $opus_name)
                ->join('pauthor', function ($join) {
                    $join->on('prpainting_id', '=', 'pauthor.opus_id')
                        ->where('type_id', '=', 11);
                })
                ->select('prpainting_id', 'opus_name', 'contact_name', 'prpainting.contact_number', 'contact_address', 'pauthor.pauthor_name', 'opus_status')
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
