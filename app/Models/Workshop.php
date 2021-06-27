<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 14:35:23
 * @LastEditTime: 2021-06-27 08:51:05
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\app\Models\Workshop.php
 * Learn and live
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $table = "workshop";
    public $timestamps = true;
    protected $primaryKey = "workshop_id";
    protected $guarded = [];

    /***
     * lzz
     * 工作坊作品信息上传功能
     * @param $request
     */
    public static function lzz_creat_work($request)
    {
        try {

            $data = self::create([
                'workshop_name' =>  $request['workshop_name'],
                'contact_name' => $request['contact_name'],
                'contact_number' => $request['contact_number'],
                'contact_address' => $request['contact_address'],
                'contact_company' => $request['contact_company'],
                'contact_post' => $request['contact_post'],
                'contact_email' => $request['contact_email'],
                'workshop_type' => $request['workshop_type'],
                'workshop_number' => $request['workshop_number'],
                'workshop_brief' => $request['workshop_brief'],
                'cha_brief' => $request['cha_brief'],
                'plan_brief' => $request['plan_brief'],
                'workshop_file' => $request['workshop_file']
            ]);
            return $data;
        } catch (\Exception $e) {
            logError('工作坊作品信息上传错误', [$e->getMessage()]);
        }
    }

    /***
     * lzz
     * 查询作品id
     * @param $request
     * @return mixed
     */
    public static function lzz_select_work($request)
    {
        try {

            $data = self::select('workshop_id')
                ->where('workshop_name', $request['workshop_name'])
                ->where('contact_number', $request['contact_number'])
                ->get();
            return $data;
        } catch (\Exception $e) {
            logError('工作坊作品信息上传错误', [$e->getMessage()]);
        }
    }

    /***
     * lzz
     * 查询所有的信息
     * @param $request
     * @return mixed
     */
    public static function lzz_select_workall($request)
    {
        try {
            $data = self::select()->get();
            return $data;
        } catch (\Exception $e) {
            logError('工作坊信息查询错误', [$e->getMessage()]);
        }
    }



    /**
     * @Author: Alexcutest
     * @description: 
     * @param {*}
     * @return {*}
     */

    public static function wor_show($opus_status)
    {
        try {
            if ($opus_status == 0) {

                $res = Workshop::where('workshop_status', '=', 0)
                    ->select('workshop_id', 'workshop_name', 'contact_name', 'contact_number', 'contact_address', 'workshop_number', 'workshop_status')
                    ->get();

                return $res ?
                    $res :
                    false;
            } elseif ($opus_status == 1) {


                $res = Workshop::where('opus_status', '=', 0)
                    ->select('workshop_id', 'workshop_name', 'contact_name', 'contact_number', 'contact_address', 'workshop_number', 'workshop_status')
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
     * @description: 艺术工坊删除
     * @param {*} $opus_id
     * @return {*}
     */
    public static function wor_delete($opus_id)
    {
        try {

            $res = Workshop::where('workshop_id', '=', $opus_id)
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
            $res = Workshop::where('workshop_name', '=', $opus_name)
                ->select('workshop_id', 'workshop_name', 'contact_name', 'contact_number', 'contact_address', 'workshop_number', 'workshop_status')
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
