<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 14:35:23
 * @LastEditTime: 2021-06-27 08:51:22
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\app\Models\Caset.php
 * Learn and live
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caset extends Model
{
    protected $table = "caset";
    public $timestamps = true;
    protected $primaryKey = "caset_id";
    protected $guarded = [];

    public static function lzz_create_case($request)
    {
        try {

            $data = self::create([
                'case_name' => $request['case_name'],
                'case_company' => $request['case_company'],
                'contact_name' => $request['contact_name'],
                'contact_number' => $request['contact_number'],
                'contact_company' => $request['contact_company'],
                'contact_email' => $request['contact_email'],
                'contact_post' => $request['contact_post'],
                'case_type' => $request['case_type'],
                'case_code' => $request['case_code'],
                'case_brief' => $request['case_brief'],
                'case_file' => $request['case_file'],
            ]);
            return $data;
        } catch (\Exception $e) {
            logError('工作坊作品信息上传错误', [$e->getMessage()]);
        }
    }

    /**
     * @Author: Alexcutest
     * @description: 优秀案例展示
     * @param {*} $opus_status
     * @return {*}
     */
    public static function cas_show($opus_status)
    {
        try {
            if ($opus_status == 0) {

                $res = Caset::where('case_status', '=', 0)
                    ->select('case_id', 'case_name', 'contact_name', 'contact_number', 'contact_email', 'case_status')
                    ->get();


                return $res ?
                    $res :
                    false;
            } elseif ($opus_status == 1) {

                $res = Caset::where('case_status', '=', 1)
                    ->select('case_id', 'case_name', 'contact_name', 'contact_number', 'contact_email', 'case_status')
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
     * @description: 优秀案例删除
     * @param {*} $opus_id
     * @return {*}
     */
    public static function cas_delete($opus_id)
    {
        try {

            $res = Caset::where('case_id', '=', $opus_id)
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
            $res = Caset::where('case_name', '=', $opus_name)
                ->select('case_id', 'case_name', 'contact_name', 'contact_number', 'contact_email', 'case_status')
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
