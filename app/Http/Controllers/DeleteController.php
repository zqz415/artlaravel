<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 17:54:38
 * @LastEditTime: 2021-06-27 01:39:01
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\app\Http\Controllers\DeleteController.php
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
use App\Models\Vocality;
use App\Models\Workshop;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * @Author: Alexcutest
     * @description: 艺术表演类删除
     * @param {Request} $request
     * @return {*}
     */    
    public function perdelete(Request $request)
    {
        $class_id = $request['class_id'];
        $opus_id = $request['opus_id'];

        if ($class_id == 1) { //声乐表删除

            $res = Vocality::per_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 2) { //器乐表删除

            $res = Insmusic::per_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 3) { //舞蹈表删除

            $res = Dance::per_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 4) { //戏剧表删除

            $res = Opera::per_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 5) { //朗诵表删除

            $res = Recitation::per_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        }
    }

    /**
     * @Author: Alexcutest
     * @description:  学生艺术作品删除 
     * @param {*}
     * @return {*}
     */    
    public function studelete(Request $request)
    {
        $class_id = $request['class_id'];
        $opus_id = $request['opus_id'];

        if ($class_id == 1) { //绘画作品表删除

            $res = Painting::stu_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 2) { //书法作品表删除

            $res = Caphy::stu_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 3) { //摄影作品表删除

            $res = Phophy::stu_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 4) { //设计作品表删除

            $res = Design::stu_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 5) { //微电影作品表删除

            $res = Film::stu_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        }
    }

    /**
     * @Author: Alexcutest
     * @description: 高校校长作品删除
     * @param {Request} $request
     * @return {*}
     */
    public function heddelete(Request $request)
    {
        $class_id = $request['class_id'];
        $opus_id = $request['opus_id'];

        if ($class_id == 1) { //校长绘画删除
            $res = Prpainting::hed_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 2) { //校长书法删除
            $res = Prcaphy::hed_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        } elseif ($class_id == 3) { //校长摄影删除
            $res = Prphophy::hed_delete($opus_id);

            return $res ?
                json_success('操作成功!', $res, 200) :
                json_fail('操作失败!', null, 100);
        }
    }
    

    /**
     * @Author: Alexcutest
     * @description: 艺术实践工坊删除
     * @param {Request} $request
     * @return {*}
     */
    public function wordelete(Request $request)
    {

        $opus_id = $request['opus_id'];
        
        $res = Workshop::wor_delete($opus_id);
        
        return $res ?
            json_success('操作成功!', $res, 200) :
            json_fail('操作失败!', null, 100);
    }


    /**
     * @Author: Alexcutest
     * @description: 优秀案例删除
     * @param {Request} $request
     * @return {*}
     */
    public function casdelete(Request $request)
    {
        
        $opus_id = $request['opus_id'];

        $res = Caset::cas_delete($opus_id);
        return $res ?
            json_success('操作成功!', $res, 200) :
            json_fail('操作失败!', null, 100);
    }
}
