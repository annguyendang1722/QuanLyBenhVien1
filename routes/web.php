<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\TinTuc;
use App\TheLoai;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin'],function()
{

    Route::group(['prefix'=>'theloai'],function()
    {
        Route::get('danhsach','TheloaiController@getDanhSach');

        
        Route::get('sua','TheloaiController@getSua');
        Route::get('them','TheloaiController@getThem');  
        Route::post('them','TheloaiController@postThem'); 
    });


    Route::group(['prefix'=>'loaitin'],function()
    {

   
    });



    Route::group(['prefix'=>'user'],function()
    {
        Route::get('danhsach','UserController@getDanhSach');

        Route::get('them','UserController@getThem')->name("admin.user.them");
        Route::post('them','UserController@postThem');  
   
        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');  
    

        Route::get('xoa/{id}','UserController@getXoa');
    });


    Route::group(['prefix'=>'tintuc'],function()
    {
        Route::get('danhsach','TinTucController@getDanhSach');


        Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem')->name("admin.tintuc.them");
        Route::get('them','TinTucController@getDanhSachTheLoai');

        Route::get('sua/{id}','TinTucController@getSua');
        Route::post('sua/{id}','TinTucController@postSua'); 

        Route::get('xoa/{id}','TinTucController@getXoa');
    });


});


