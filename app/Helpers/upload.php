<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

if (!function_exists('upload_file')) {
    /***
     * 传入的参数是file
     *
     * @param Request $request
     * @return false|\Illuminate\Http\JsonResponse|string
     */
    function upload_file(Request $request)
    {
        //对文件进行判断
        $file = $request->file('file');
        if(empty($file))
        {
            return json_success("图片不能为空",null);
        }
        //上传文件
        $disk = Storage::disk('cosv5');
        $file_content = $disk -> put('art',$file);//第一个参数是你储存桶里想要放置文件的路径，第二个参数是文件对象
        $file_url = $disk->url($file_content);//获取到文件的线上地址
        return json_success("图片上传成功",$file_url,200);

    }
}
