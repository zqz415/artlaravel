<?php

namespace App\Http\Controllers\Pauther;

use App\Http\Controllers\Controller;
use App\Models\Pauthor;
use App\Models\Prpainting;
use App\Models\Teacher;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkShopController extends Controller
{
    /***
     * lzz
     * 工作坊上传功能
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public static function workshop(Request $request){
           $data = Workshop::lzz_creat_work($request);
           $data = Workshop::lzz_select_workall($request);
        return $data?
            json_success('工作坊作品上传成功！' , null, '200'):
            json_fail('工作坊作品上传失败！' , null, '100');
    }

    /***
     * lzz
     * 工作坊教师信息上传功能
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public static function creatworkuer(Request $request){
        $id = Workshop::lzz_select_work($request);
        $data = Teacher::lzz_creat_teacher($request,$id);
        return $data?
            json_success('工作坊作者信息上传成功！' , null, '200'):
            json_fail('工作坊作者信息上传失败！' , null, '100');
    }

}
