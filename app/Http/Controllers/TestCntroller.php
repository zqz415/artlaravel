<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestCntroller extends Controller
{
    public function upload_file(Request $request)
    {
        //对文件进行判断
        $file = $request->file('file');
        if(empty($file))
        {
            return json_encode(['msg'=>'文件不能为空','status'=>0]);
        }
        //上传文件
        $disk = Storage::disk('cosv5');
        $file_content = $disk -> put('art',$file);//第一个参数是你储存桶里想要放置文件的路径，第二个参数是文件对象
        $file_url = $disk->url($file_content);//获取到文件的线上地址
        return json_success("文件上传成功",$file_url,200);
    }

}
