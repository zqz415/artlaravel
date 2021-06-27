<?php

namespace App\Http\Controllers\Pauther;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pauther\CaphyRequest;
use App\Models\Caphy;
use App\Models\Pauthor;
use App\Models\Prcaphy;
use Illuminate\Http\Request;

class CaphyController extends Controller
{
    /***
     * 绘画作品上传
     * @param CaphyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function creatCaphy(CaphyRequest $request){
        $data = Prcaphy::lzz_creat_caphy($request);
        $id = Prcaphy::lzz_select_caphy($request);
        $id =json_decode($id);
        $id = $id[0]->prcaphy_id;
        $date = Pauthor::lzz_creat_pauthor($request,$id);
        return $date&&$data?
            json_success('校长绘画作品上传成功！' , null, '200'):
            json_fail('校长绘画作品上传失败！' , null, '100');
    }

}
