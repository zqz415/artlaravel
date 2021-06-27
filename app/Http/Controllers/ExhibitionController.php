<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 15:32:42
 * @LastEditTime: 2021-06-27 07:57:39
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\app\Http\Controllers\ExhibitionController.php
 * Learn and live
 */

namespace App\Http\Controllers;

use App\Models\Caphy;
use App\Models\Caset;
use App\Models\Dance;
use App\Models\Design;
use App\Models\Film;
use App\Models\Insmusic;
use App\Models\Opera;
use App\Models\Painting;
use App\Models\Phophy;
use App\Models\Prcaphy;
use App\Models\Prpainting;
use App\Models\Prphophy;
use App\Models\Recitation;
use App\Models\Teacher;
use App\Models\Vocality;
use App\Models\Workshop;
use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    /**
     * @Author: Alexcutest
     * @description: 艺术表演类统计
     * @param {Request} $request
     * @return {*}
     */
    public function perexhibition(Request $request)
    {
        $class_id = $request['class_id'];
        $opus_status = $request['opus_status'];

        if ($class_id == 0) { //查询全部

            $res1 = Vocality::per_show($opus_status);
            $res2 = Insmusic::per_show($opus_status);
            $res3 = Dance::per_show($opus_status);
            $res4 = Opera::per_show($opus_status);
            $res5 = Recitation::per_show($opus_status);

            $res['res1'] = $res1;
            $res['res2'] = $res2;
            $res['res3'] = $res3;
            $res['res4'] = $res4;
            $res['res5'] = $res5;


            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 1) { //声乐表查询

            $res = Vocality::per_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 2) { //器乐表查询

            $res = Insmusic::per_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 3) { //舞蹈表查询

            $res = Dance::per_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 4) { //戏剧表查询

            $res = Opera::per_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 5) { //朗诵表查询

            $res = Recitation::per_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        }
    }

    /**
     * @Author: Alexcutest
     * @description: 学生艺术作品统计
     * @param {Request} $request
     * @return {*}
     */
    public function stuexhibition(Request $request)
    {
        $class_id = $request['class_id'];
        $opus_status = $request['opus_status'];

        if ($class_id == 0) { //查询全部

            $res1 = Painting::stu_show($opus_status);
            $res2 = Caphy::stu_show($opus_status);
            $res3 = Phophy::stu_show($opus_status);
            $res4 = Design::stu_show($opus_status);
            $res5 = Film::stu_show($opus_status);

            $res['res1'] = $res1;
            $res['res2'] = $res2;
            $res['res3'] = $res3;
            $res['res4'] = $res4;
            $res['res5'] = $res5;

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 1) { //绘画作品表

            $res = Painting::stu_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 2) { //书法作品表

            $res = Caphy::stu_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 3) { //摄影作品表

            $res = Phophy::stu_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 4) { //设计作品表

            $res = Design::stu_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 5) { //微电影作品表

            $res = Film::stu_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        }
    }



    /**
     * @Author: Alexcutest
     * @description: 高校校长作品统计
     * @param {Request} $request
     * @return {*}
     */
    public function hedexhibition(Request $request)
    {
        $class_id = $request['class_id'];
        $opus_status = $request['opus_status'];

        if ($class_id == 0) {
            $res1 = Prpainting::hed_show($opus_status);
            $res2 = Prcaphy::hed_show($opus_status);
            $res3 = Prphophy::hed_show($opus_status);

            $res['res1'] = $res1;
            $res['res2'] = $res2;
            $res['res3'] = $res3;

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 1) { //校长绘画
            $res = Prpainting::hed_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 2) { //校长书法
            $res = Prcaphy::hed_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 3) { //校长摄影
            $res = Prphophy::hed_show($opus_status);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        }
    }



    /**
     * @Author: Alexcutest
     * @description: 艺术实践工坊统计
     * @param {Request} $request
     * @return {*}
     */
    public function worexhibition(Request $request)
    {

        $opus_status = $request['opus_status'];
        //$res = Teacher::wor_show($opus_status);
        $res = Workshop::wor_show($opus_status);

        return $res ?
            json_success('操作成功!', $res, 200) :
            json_fail('操作失败!', null, 100);
    }




    /**
     * @Author: Alexcutest
     * @description: 优秀案例统计
     * @param {Request} $request
     * @return {*}
     */
    public function casexhibition(Request $request)
    {

        $opus_status = $request['opus_status'];

        $res = Caset::cas_show($opus_status);
        return $res ?
            json_success('操作成功!', $res, 200) :
            json_fail('操作失败!', null, 100);
    }








    /**
     * @Author: Alexcutest
     * @description: 搜索
     * @param {Request} $request
     * @return {*}
     */
    public function searchexhibition(Request $request)
    {
        $class_id = $request['class_id'];
        $opus_name = $request['opus_name'];




        if ($class_id == 1) { //艺术表演类搜索

            $res1 = Vocality::search_show($opus_name);
            $res2 = Insmusic::search_show($opus_name);
            $res3 = Dance::search_show($opus_name);
            $res4 = Opera::search_show($opus_name);
            $res5 = Recitation::search_show($opus_name);

            $res['res1'] = $res1;
            $res['res2'] = $res2;
            $res['res3'] = $res3;
            $res['res4'] = $res4;
            $res['res5'] = $res5;


            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 2) { //学生作品类搜索

            $res1 = Painting::search_show($opus_name);
            $res2 = Caphy::search_show($opus_name);
            $res3 = Phophy::search_show($opus_name);
            $res4 = Design::search_show($opus_name);
            $res5 = Film::search_show($opus_name);

            $res['res1'] = $res1;
            $res['res2'] = $res2;
            $res['res3'] = $res3;
            $res['res4'] = $res4;
            $res['res5'] = $res5;

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 3) { //高校校长类搜索

            $res1 = Prpainting::search_show($opus_name);
            $res2 = Prcaphy::search_show($opus_name);
            $res3 = Prphophy::search_show($opus_name);

            $res['res1'] = $res1;
            $res['res2'] = $res2;
            $res['res3'] = $res3;

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 4) { //艺术工坊搜索

            $res = Workshop::search_show($opus_name);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 5) { //优秀案例搜索工坊搜索

            $res = Caset::search_show($opus_name);
            
            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        }
    }
}
