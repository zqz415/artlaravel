<?php

namespace App\Http\Controllers\Pauther;

use App\Http\Controllers\Controller;
use App\Models\Caset;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    /***
     * lzz
     * 优秀案列上传功能
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function lzzcreatcase(Request $request){
        $data = Caset::lzz_create_case($request);
            return $data?
                json_success('优秀案例作品上传成功！' , null, '200'):
                json_fail('优秀案例作品上传失败！' , null, '100');
    }
}
