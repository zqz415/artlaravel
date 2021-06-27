<?php
/*
 * @Author: Alexcutest
 * @Date: 2021-06-26 14:35:23
 * @LastEditTime: 2021-06-27 06:55:17
 * @LastEditors: Alexcutest
 * @Description: 
 * @FilePath: \artlaravel\routes\api.php
 * Learn and live
 */

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('uppic')->group(function (){
    Route::post('uppic','TestCntroller@upload_file');//上传图片
});//lzz
Route::prefix('user')->group(function () {
    Route::post('login', 'LoginController@login'); //管理员登陆
    Route::post('logout', 'LoginController@logout'); //管理员退出登陆
    Route::post('registered', 'LoginController@registered'); //管理员注册
});//--lzz
Route::prefix('pauther')->namespace('Pauther')->group(function () {
    Route::post('paintingcreat', 'PrpaintingController@creatPrpain'); //校长绘画作品上传
    Route::post('caphycreat', 'CaphyController@creatCaphy'); //校长书法作品上传
    Route::post('phophycreat', 'PhophyController@creatPphphy'); //校长摄影作品上
    Route::post('casecreat', 'CaseController@lzzcreatcase'); //工作坊作品上传
    Route::post('whorkshopcreat', 'WorkShopController@workshop'); //工作坊作品上传
    Route::post('theashopcreat', 'WorkShopController@creatworkuer'); //工作坊作品教师上传
});//--lzz


Route::prefix('exhibition')->group(function (){
    /**
     * @Author: Alexcutest
     */    
    Route::get('perexhibition','ExhibitionController@perexhibition');//艺术表演统计
    Route::get('stuexhibition','ExhibitionController@stuexhibition');//学生艺术作品统计
    Route::get('hedexhibition','ExhibitionController@hedexhibition');//校长艺术作品统计
    Route::get('worexhibition','ExhibitionController@worexhibition');//艺术实践统计
    Route::get('casexhibition','ExhibitionController@casexhibition');//优秀案例统计

    
    Route::get('searchexhibition','ExhibitionController@searchexhibition');//搜索
    
});

Route::prefix('delete')->group(function(){
/**
 * @Author: Alexcutest
 */   

Route::get('perdelete','DeleteController@perdelete');//艺术表演删除
Route::get('studelete','DeleteController@studelete');//学生艺术作品删除
Route::get('heddelete','DeleteController@heddelete');//校长艺术作品删除
Route::get('wordelete','DeleteController@wordelete');//艺术实践删除
Route::get('casdelete','DeleteController@casdelete');//优秀案例删除

});