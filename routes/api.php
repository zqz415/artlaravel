<?php

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
