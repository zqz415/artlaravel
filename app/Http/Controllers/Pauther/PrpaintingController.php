<?php

namespace App\Http\Controllers\Pauther;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pauther\PrpaintingRequest;
use App\Models\Pauthor;
use App\models\Prpainting;
use Illuminate\Http\Request;

class PrpaintingController extends Controller
{
    /***
     * lzz
     * 上传校长绘画作品功能
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public static function creatPrpain(PrpaintingRequest $request)
    {

        $data = Prpainting::lzz_creat_prpa($request);
        $id = Prpainting::lzz_select_prpa($request);
        $id =json_decode($id);
        $id = $id[0]->prpainting_id;
        $date = Pauthor::lzz_creat_pauthor($request,$id);
        return $date&&$data?
            json_success('校长绘画作品上传成功！' , null, '200'):
            json_fail('校长绘画作品上传失败！' , null, '100');
    }
}
