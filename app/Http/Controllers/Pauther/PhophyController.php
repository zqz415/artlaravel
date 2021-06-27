<?php

namespace App\Http\Controllers\Pauther;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pauther\PhophyRequest;
use App\Http\Requests\Pauther\PrpaintingRequest;
use App\Models\Pauthor;
use App\Models\Phophy;
use App\Models\Prpainting;
use App\Models\Prphophy;
use Illuminate\Http\Request;

class PhophyController extends Controller
{
 /***
 * lzz
 * 上传校长摄影作品功能
 * @param Request $request
 * @return \Illuminate\Http\JsonResponse
 */
    public static function creatPphphy(PhophyRequest $request)
    {

        $data = Prphophy::lzz_creat_phophy($request);
        $id = Prphophy::lzz_select_phophy($request);
        $id =json_decode($id);
        $id = $id[0]->prphophy_id;
        $date = Pauthor::lzz_creat_pauthor($request,$id);
        return $date&&$data?
            json_success('校长摄影作品上传成功！' , null, '200'):
            json_fail('校长摄影作品上传失败！' , null, '100');
    }
}
